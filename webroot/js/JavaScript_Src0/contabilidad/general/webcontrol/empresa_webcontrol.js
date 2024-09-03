//<script type="text/javascript" language="javascript">



//var empresaJQueryPaginaWebInteraccion= function (empresa_control) {
//this.,this.,this.

class empresa_webcontrol extends empresa_webcontrol_add {
	
	empresa_control=null;
	empresa_controlInicial=null;
	empresa_controlAuxiliar=null;
		
	//if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(empresa_control) {
		super();
		
		this.empresa_control=empresa_control;
	}
		
	actualizarVariablesPagina(empresa_control) {
		
		if(empresa_control.action=="index" || empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(empresa_control);
			
		} else if(empresa_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(empresa_control);
		
		} else if(empresa_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(empresa_control);
		
		} else if(empresa_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(empresa_control);
		
		} else if(empresa_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(empresa_control);
			
		} else if(empresa_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(empresa_control);
			
		} else if(empresa_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(empresa_control);
		
		} else if(empresa_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(empresa_control);
		
		} else if(empresa_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(empresa_control);
		
		} else if(empresa_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(empresa_control);
		
		} else if(empresa_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(empresa_control);
		
		} else if(empresa_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(empresa_control);
		
		} else if(empresa_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(empresa_control);
		
		} else if(empresa_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(empresa_control);
		
		} else if(empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(empresa_control);
		
		} else if(empresa_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(empresa_control);
		
		} else if(empresa_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(empresa_control);
		
		} else if(empresa_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(empresa_control);
		
		} else if(empresa_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(empresa_control);
		
		} else if(empresa_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(empresa_control);
		
		} else if(empresa_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(empresa_control);
		
		} else if(empresa_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(empresa_control);
		
		} else if(empresa_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(empresa_control);
		
		} else if(empresa_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(empresa_control);		
		
		} else if(empresa_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(empresa_control);		
		
		} else if(empresa_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(empresa_control);		
		
		} else if(empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control);		
		}
		else if(empresa_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(empresa_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(empresa_control.action + " Revisar Manejo");
			
			if(empresa_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(empresa_control);
				
				return;
			}
			
			//if(empresa_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(empresa_control);
			//}
			
			if(empresa_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && empresa_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(empresa_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(empresa_control, false);			
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(empresa_control);	
			}
			
			if(empresa_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(empresa_control);	
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(empresa_control);
			}
			
			
			if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(empresa_control);			
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(empresa_control);
			}
			
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
			}
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(empresa_control);
			}				
			
			if(empresa_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(empresa_control);
			}
			
			if(empresa_control.usuarioActual!=null && empresa_control.usuarioActual.field_strUserName!=null &&
			empresa_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(empresa_control);			
			}
		}
		
		
		if(empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(empresa_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(empresa_control) {
		
		this.actualizarPaginaCargaGeneral(empresa_control);
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
		this.actualizarPaginaAreaBusquedas(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(empresa_control) {
		
		this.actualizarPaginaCargaGeneral(empresa_control);
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
		this.actualizarPaginaAreaBusquedas(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(empresa_control) {
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(empresa_control) {
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(empresa_control) {
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(empresa_control) {
		this.actualizarPaginaAbrirLink(empresa_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);				
		this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(empresa_control) {
		this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(empresa_control) {
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);
		this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(empresa_control) {
		this.actualizarPaginaAbrirLink(empresa_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(empresa_control) {
		this.actualizarPaginaImprimir(empresa_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(empresa_control) {
		this.actualizarPaginaImprimir(empresa_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);
			this.actualizarPaginaFormularioAdd(empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);	
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(empresa_control) {
		//FORMULARIO
		if(empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(empresa_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(empresa_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);	
		//COMBOS FK
		if(empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(empresa_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(empresa_control) {
		if(empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(empresa_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(empresa_control) {
		if(empresa_funcion1.esPaginaForm()==true) {
			window.opener.empresa_webcontrol1.actualizarPaginaTablaDatos(empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(empresa_control) {
		empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(empresa_control.strAuxiliarUrlPagina);
				
		empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(empresa_control.strAuxiliarTipo,empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(empresa_control) {
		empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
			
		if(empresa_funcion1.esPaginaForm()==true) {
			window.opener.empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(empresa_control) {
		eval(empresa_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(empresa_control, mostrar) {
		
		if(mostrar==true) {
			empresa_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				empresa_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			empresa_funcion1.mostrarDivMensaje(true,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		
		} else {
			empresa_funcion1.mostrarDivMensaje(false,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(empresa_control) {
	
		funcionGeneral.printWebPartPage("empresa",empresa_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarempresasAjaxWebPart").html(empresa_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("empresa",jQuery("#divTablaDatosReporteAuxiliarempresasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(empresa_control) {
		this.empresa_controlInicial=empresa_control;
			
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(empresa_control.strStyleDivArbol,empresa_control.strStyleDivContent
																,empresa_control.strStyleDivOpcionesBanner,empresa_control.strStyleDivExpandirColapsar
																,empresa_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=empresa_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",empresa_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(empresa_control) {
		jQuery("#divTablaDatosempresasAjaxWebPart").html(empresa_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosempresas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(empresa_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosempresas=jQuery("#tblTablaDatosempresas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("empresa",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',empresa_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			empresa_webcontrol1.registrarControlesTableEdition(empresa_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		empresa_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(empresa_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(empresa_control.empresaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(empresa_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(empresa_control) {
		this.actualizarCssBotonesPagina(empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(empresa_control.tiposReportes,empresa_control.tiposReporte
															 	,empresa_control.tiposPaginacion,empresa_control.tiposAcciones
																,empresa_control.tiposColumnasSelect,empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(empresa_control);			
	}
	
	actualizarPaginaAreaBusquedas(empresa_control) {
		jQuery("#divBusquedaempresaAjaxWebPart").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trempresaCabeceraBusquedas").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedaempresa").css("display",empresa_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(empresa_control.htmlTablaOrderBy!=null
			&& empresa_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByempresaAjaxWebPart").html(empresa_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//empresa_webcontrol1.registrarOrderByActions();
			
		}
			
		if(empresa_control.htmlTablaOrderByRel!=null
			&& empresa_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelempresaAjaxWebPart").html(empresa_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(empresa_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaempresaAjaxWebPart").css("display","none");
			jQuery("#trempresaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaempresa").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(empresa_control) {
		jQuery("#tdempresaNuevo").css("display",empresa_control.strPermisoNuevo);
		jQuery("#trempresaElementos").css("display",empresa_control.strVisibleTablaElementos);
		jQuery("#trempresaAcciones").css("display",empresa_control.strVisibleTablaAcciones);
		jQuery("#trempresaParametrosAcciones").css("display",empresa_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(empresa_control) {
	
		this.actualizarCssBotonesMantenimiento(empresa_control);
				
		if(empresa_control.empresaActual!=null) {//form
			
			this.actualizarCamposFormulario(empresa_control);			
		}
						
		this.actualizarSpanMensajesCampos(empresa_control);
	}
	
	actualizarPaginaUsuarioInvitado(empresa_control) {
	
		var indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(empresa_control) {
		jQuery("#divResumenempresaActualAjaxWebPart").html(empresa_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(empresa_control) {
		jQuery("#divAccionesRelacionesempresaAjaxWebPart").html(empresa_control.htmlTablaAccionesRelaciones);
			
		empresa_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(empresa_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(empresa_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(empresa_control) {
		
		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",empresa_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",empresa_control.strVisibleFK_Idciudad);
		}

		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idpais").attr("style",empresa_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idpais").attr("style",empresa_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionempresa();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("empresa","general","",empresa_funcion1,empresa_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("empresa",id,"general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);		
	}
	
	

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		empresa_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("empresa","pais","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		empresa_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("empresa","ciudad","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(empresa_control) {
	
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id").val(empresa_control.empresaActual.id);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-version_row").val(empresa_control.empresaActual.versionRow);
		
		if(empresa_control.empresaActual.id_pais!=null && empresa_control.empresaActual.id_pais>-1){
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != empresa_control.empresaActual.id_pais) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(empresa_control.empresaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(empresa_control.empresaActual.id_ciudad!=null && empresa_control.empresaActual.id_ciudad>-1){
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != empresa_control.empresaActual.id_ciudad) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(empresa_control.empresaActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-ruc").val(empresa_control.empresaActual.ruc);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-nombre").val(empresa_control.empresaActual.nombre);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-nombre_comercial").val(empresa_control.empresaActual.nombre_comercial);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-sector").val(empresa_control.empresaActual.sector);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion1").val(empresa_control.empresaActual.direccion1);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion2").val(empresa_control.empresaActual.direccion2);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-direccion3").val(empresa_control.empresaActual.direccion3);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-telefono1").val(empresa_control.empresaActual.telefono1);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-movil").val(empresa_control.empresaActual.movil);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-mail").val(empresa_control.empresaActual.mail);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-sitio_web").val(empresa_control.empresaActual.sitio_web);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-codigo_postal").val(empresa_control.empresaActual.codigo_postal);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-fax").val(empresa_control.empresaActual.fax);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-logo").val(empresa_control.empresaActual.logo);
		jQuery("#form"+empresa_constante1.STR_SUFIJO+"-icono").val(empresa_control.empresaActual.icono);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+empresa_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("empresa","general","","form_empresa",formulario,"","",paraEventoTabla,idFilaTabla,empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	cargarCombosFK(empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(empresa_control.strRecargarFkTiposNinguno!=null && empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && empresa_control.strRecargarFkTiposNinguno!='') {
			
				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombospaissFK(empresa_control);
				}

				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(empresa_control) {
		jQuery("#spanstrMensajeid").text(empresa_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(empresa_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_pais").text(empresa_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_ciudad").text(empresa_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajeruc").text(empresa_control.strMensajeruc);		
		jQuery("#spanstrMensajenombre").text(empresa_control.strMensajenombre);		
		jQuery("#spanstrMensajenombre_comercial").text(empresa_control.strMensajenombre_comercial);		
		jQuery("#spanstrMensajesector").text(empresa_control.strMensajesector);		
		jQuery("#spanstrMensajedireccion1").text(empresa_control.strMensajedireccion1);		
		jQuery("#spanstrMensajedireccion2").text(empresa_control.strMensajedireccion2);		
		jQuery("#spanstrMensajedireccion3").text(empresa_control.strMensajedireccion3);		
		jQuery("#spanstrMensajetelefono1").text(empresa_control.strMensajetelefono1);		
		jQuery("#spanstrMensajemovil").text(empresa_control.strMensajemovil);		
		jQuery("#spanstrMensajemail").text(empresa_control.strMensajemail);		
		jQuery("#spanstrMensajesitio_web").text(empresa_control.strMensajesitio_web);		
		jQuery("#spanstrMensajecodigo_postal").text(empresa_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(empresa_control.strMensajefax);		
		jQuery("#spanstrMensajelogo").text(empresa_control.strMensajelogo);		
		jQuery("#spanstrMensajeicono").text(empresa_control.strMensajeicono);		
	}
	
	actualizarCssBotonesMantenimiento(empresa_control) {
		jQuery("#tdbtnNuevoempresa").css("visibility",empresa_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoempresa").css("display",empresa_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarempresa").css("visibility",empresa_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarempresa").css("display",empresa_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarempresa").css("visibility",empresa_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarempresa").css("display",empresa_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarempresa").css("visibility",empresa_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosempresa").css("visibility",empresa_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosempresa").css("display",empresa_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarempresa").css("visibility",empresa_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablapaisFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.paissFK);
	}

	cargarComboEditarTablaciudadFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(empresa_control) {
		var i=0;
		
		i=empresa_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(empresa_control.empresaActual.id);
		jQuery("#t-version_row_"+i+"").val(empresa_control.empresaActual.versionRow);
		
		if(empresa_control.empresaActual.id_pais!=null && empresa_control.empresaActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != empresa_control.empresaActual.id_pais) {
				jQuery("#t-cel_"+i+"_2").val(empresa_control.empresaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(empresa_control.empresaActual.id_ciudad!=null && empresa_control.empresaActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != empresa_control.empresaActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_3").val(empresa_control.empresaActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(empresa_control.empresaActual.ruc);
		jQuery("#t-cel_"+i+"_5").val(empresa_control.empresaActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(empresa_control.empresaActual.nombre_comercial);
		jQuery("#t-cel_"+i+"_7").val(empresa_control.empresaActual.sector);
		jQuery("#t-cel_"+i+"_8").val(empresa_control.empresaActual.direccion1);
		jQuery("#t-cel_"+i+"_9").val(empresa_control.empresaActual.direccion2);
		jQuery("#t-cel_"+i+"_10").val(empresa_control.empresaActual.direccion3);
		jQuery("#t-cel_"+i+"_11").val(empresa_control.empresaActual.telefono1);
		jQuery("#t-cel_"+i+"_12").val(empresa_control.empresaActual.movil);
		jQuery("#t-cel_"+i+"_13").val(empresa_control.empresaActual.mail);
		jQuery("#t-cel_"+i+"_14").val(empresa_control.empresaActual.sitio_web);
		jQuery("#t-cel_"+i+"_15").val(empresa_control.empresaActual.codigo_postal);
		jQuery("#t-cel_"+i+"_16").val(empresa_control.empresaActual.fax);
		jQuery("#t-cel_"+i+"_17").val(empresa_control.empresaActual.logo);
		jQuery("#t-cel_"+i+"_18").val(empresa_control.empresaActual.icono);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(empresa_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(empresa_control) {
		empresa_funcion1.registrarControlesTableValidacionEdition(empresa_control,empresa_webcontrol1,empresa_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresaConstante,strParametros);
		
		//empresa_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombospaissFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_pais",empresa_control.paissFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_2",empresa_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",empresa_control.paissFK);

	};

	cargarCombosciudadsFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad",empresa_control.ciudadsFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_3",empresa_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",empresa_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombospaissFK(empresa_control) {

	};

	registrarComboActionChangeCombosciudadsFK(empresa_control) {

	};

	
	
	setDefectoValorCombospaissFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idpaisDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != empresa_control.idpaisDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(empresa_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(empresa_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idciudadDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != empresa_control.idciudadDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(empresa_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(empresa_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombosciudadsFK(empresa_control);
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
	onLoadCombosEventosFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombospaissFK(empresa_control);
			//}

			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombosciudadsFK(empresa_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("empresa");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("empresa");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(empresa_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
			
			if(empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,"empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("empresa","FK_Idciudad","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("empresa","FK_Idpais","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			empresa_funcion1.validarFormularioJQuery(empresa_constante1);
			
			if(empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("empresa","general","",empresa_funcion1,empresa_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(empresa_control) {
		
		jQuery("#divBusquedaempresaAjaxWebPart").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trempresaCabeceraBusquedas").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedaempresa").css("display",empresa_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteempresa").css("display",empresa_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosempresa").attr("style",empresa_control.strPermisoMostrarTodos);
		
		if(empresa_control.strPermisoNuevo!=null) {
			jQuery("#tdempresaNuevo").css("display",empresa_control.strPermisoNuevo);
			jQuery("#tdempresaNuevoToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdempresaDuplicar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdempresaDuplicarToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdempresaNuevoGuardarCambios").css("display",empresa_control.strPermisoNuevo);
			jQuery("#tdempresaNuevoGuardarCambiosToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdempresaActualizarToolBar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdempresaCopiar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdempresaCopiarToolBar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdempresaConEditar").css("display",empresa_control.strPermisoActualizar);
		}
		
		jQuery("#tdempresaEliminarToolBar").css("display",empresa_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdempresaGuardarCambios").css("display",empresa_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdempresaGuardarCambiosToolBar").css("display",empresa_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trempresaElementos").css("display",empresa_control.strVisibleTablaElementos);
		
		jQuery("#trempresaAcciones").css("display",empresa_control.strVisibleTablaAcciones);
		jQuery("#trempresaParametrosAcciones").css("display",empresa_control.strVisibleTablaAcciones);
			
		jQuery("#tdempresaCerrarPagina").css("display",empresa_control.strPermisoPopup);		
		jQuery("#tdempresaCerrarPaginaToolBar").css("display",empresa_control.strPermisoPopup);
		//jQuery("#trempresaAccionesRelaciones").css("display",empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("empresa","general","",empresa_funcion1,empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarEventosControles();
		
		if(empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(empresa_constante1.STR_ES_RELACIONES=="true") {
			if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				empresa_webcontrol1.onLoad();
				
			} else {
				if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
					if(empresa_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
						//empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(empresa_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(empresa_constante1.BIG_ID_ACTUAL,"empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
						//empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			empresa_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var empresa_webcontrol1=new empresa_webcontrol();

if(empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = empresa_webcontrol1.onLoadWindow; 
}

//</script>