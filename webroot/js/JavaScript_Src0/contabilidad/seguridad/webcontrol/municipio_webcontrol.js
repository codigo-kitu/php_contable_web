//<script type="text/javascript" language="javascript">



//var municipioJQueryPaginaWebInteraccion= function (municipio_control) {
//this.,this.,this.

class municipio_webcontrol extends municipio_webcontrol_add {
	
	municipio_control=null;
	municipio_controlInicial=null;
	municipio_controlAuxiliar=null;
		
	//if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(municipio_control) {
		super();
		
		this.municipio_control=municipio_control;
	}
		
	actualizarVariablesPagina(municipio_control) {
		
		if(municipio_control.action=="index" || municipio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(municipio_control);
			
		} else if(municipio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(municipio_control);
		
		} else if(municipio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(municipio_control);
		
		} else if(municipio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(municipio_control);
		
		} else if(municipio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(municipio_control);
			
		} else if(municipio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(municipio_control);
			
		} else if(municipio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(municipio_control);
		
		} else if(municipio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(municipio_control);
		
		} else if(municipio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(municipio_control);
		
		} else if(municipio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(municipio_control);
		
		} else if(municipio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(municipio_control);
		
		} else if(municipio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(municipio_control);
		
		} else if(municipio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(municipio_control);
		
		} else if(municipio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(municipio_control);
		
		} else if(municipio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(municipio_control);
		
		} else if(municipio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(municipio_control);
		
		} else if(municipio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(municipio_control);
		
		} else if(municipio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(municipio_control);
		
		} else if(municipio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(municipio_control);
		
		} else if(municipio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(municipio_control);
		
		} else if(municipio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(municipio_control);
		
		} else if(municipio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(municipio_control);
		
		} else if(municipio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(municipio_control);
		
		} else if(municipio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(municipio_control);		
		
		} else if(municipio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(municipio_control);		
		
		} else if(municipio_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(municipio_control);		
		
		} else if(municipio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(municipio_control.action + " Revisar Manejo");
			
			if(municipio_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(municipio_control);
				
				return;
			}
			
			//if(municipio_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(municipio_control);
			//}
			
			if(municipio_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && municipio_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(municipio_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(municipio_control, false);			
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(municipio_control);	
			}
			
			if(municipio_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(municipio_control);	
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(municipio_control);
			}
			
			
			if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(municipio_control);			
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(municipio_control);
			}
			
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
			}
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(municipio_control);
			}				
			
			if(municipio_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(municipio_control);
			}
			
			if(municipio_control.usuarioActual!=null && municipio_control.usuarioActual.field_strUserName!=null &&
			municipio_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(municipio_control);			
			}
		}
		
		
		if(municipio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(municipio_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(municipio_control) {
		
		this.actualizarPaginaCargaGeneral(municipio_control);
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
		this.actualizarPaginaAreaBusquedas(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(municipio_control) {
		
		this.actualizarPaginaCargaGeneral(municipio_control);
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
		this.actualizarPaginaAreaBusquedas(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(municipio_control) {
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(municipio_control) {
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(municipio_control) {
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(municipio_control) {
		this.actualizarPaginaAbrirLink(municipio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);				
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(municipio_control) {
		this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(municipio_control) {
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(municipio_control) {
		this.actualizarPaginaAbrirLink(municipio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(municipio_control) {
		this.actualizarPaginaImprimir(municipio_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(municipio_control) {
		this.actualizarPaginaImprimir(municipio_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(municipio_control) {
		//FORMULARIO
		if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(municipio_control);
			this.actualizarPaginaFormularioAdd(municipio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//COMBOS FK
		if(municipio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(municipio_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(municipio_control) {
		//FORMULARIO
		if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(municipio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);	
		//COMBOS FK
		if(municipio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(municipio_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(municipio_control) {
		if(municipio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && municipio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(municipio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(municipio_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(municipio_control) {
		if(municipio_funcion1.esPaginaForm()==true) {
			window.opener.municipio_webcontrol1.actualizarPaginaTablaDatos(municipio_control);
		} else {
			this.actualizarPaginaTablaDatos(municipio_control);
		}
	}
	
	actualizarPaginaAbrirLink(municipio_control) {
		municipio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(municipio_control.strAuxiliarUrlPagina);
				
		municipio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(municipio_control.strAuxiliarTipo,municipio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(municipio_control) {
		municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
			
		if(municipio_funcion1.esPaginaForm()==true) {
			window.opener.municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(municipio_control) {
		eval(municipio_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(municipio_control, mostrar) {
		
		if(mostrar==true) {
			municipio_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				municipio_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			municipio_funcion1.mostrarDivMensaje(true,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		
		} else {
			municipio_funcion1.mostrarDivMensaje(false,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(municipio_control) {
	
		funcionGeneral.printWebPartPage("municipio",municipio_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarmunicipiosAjaxWebPart").html(municipio_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("municipio",jQuery("#divTablaDatosReporteAuxiliarmunicipiosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(municipio_control) {
		this.municipio_controlInicial=municipio_control;
			
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(municipio_control.strStyleDivArbol,municipio_control.strStyleDivContent
																,municipio_control.strStyleDivOpcionesBanner,municipio_control.strStyleDivExpandirColapsar
																,municipio_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=municipio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",municipio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(municipio_control) {
		jQuery("#divTablaDatosmunicipiosAjaxWebPart").html(municipio_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosmunicipios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(municipio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosmunicipios=jQuery("#tblTablaDatosmunicipios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("municipio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',municipio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			municipio_webcontrol1.registrarControlesTableEdition(municipio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		municipio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(municipio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(municipio_control.municipioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(municipio_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(municipio_control) {
		this.actualizarCssBotonesPagina(municipio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(municipio_control.tiposReportes,municipio_control.tiposReporte
															 	,municipio_control.tiposPaginacion,municipio_control.tiposAcciones
																,municipio_control.tiposColumnasSelect,municipio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(municipio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(municipio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(municipio_control);			
	}
	
	actualizarPaginaAreaBusquedas(municipio_control) {
		jQuery("#divBusquedamunicipioAjaxWebPart").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trmunicipioCabeceraBusquedas").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trBusquedamunicipio").css("display",municipio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(municipio_control.htmlTablaOrderBy!=null
			&& municipio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBymunicipioAjaxWebPart").html(municipio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//municipio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(municipio_control.htmlTablaOrderByRel!=null
			&& municipio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelmunicipioAjaxWebPart").html(municipio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(municipio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedamunicipioAjaxWebPart").css("display","none");
			jQuery("#trmunicipioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedamunicipio").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(municipio_control) {
		jQuery("#tdmunicipioNuevo").css("display",municipio_control.strPermisoNuevo);
		jQuery("#trmunicipioElementos").css("display",municipio_control.strVisibleTablaElementos);
		jQuery("#trmunicipioAcciones").css("display",municipio_control.strVisibleTablaAcciones);
		jQuery("#trmunicipioParametrosAcciones").css("display",municipio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(municipio_control) {
	
		this.actualizarCssBotonesMantenimiento(municipio_control);
				
		if(municipio_control.municipioActual!=null) {//form
			
			this.actualizarCamposFormulario(municipio_control);			
		}
						
		this.actualizarSpanMensajesCampos(municipio_control);
	}
	
	actualizarPaginaUsuarioInvitado(municipio_control) {
	
		var indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(municipio_control) {
		jQuery("#divResumenmunicipioActualAjaxWebPart").html(municipio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(municipio_control) {
		jQuery("#divAccionesRelacionesmunicipioAjaxWebPart").html(municipio_control.htmlTablaAccionesRelaciones);
			
		municipio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(municipio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(municipio_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(municipio_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionmunicipio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("municipio",id,"seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(municipio_control) {
	
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-id").val(municipio_control.municipioActual.id);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-version_row").val(municipio_control.municipioActual.versionRow);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo").val(municipio_control.municipioActual.codigo);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-municipio").val(municipio_control.municipioActual.municipio);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-departamento").val(municipio_control.municipioActual.departamento);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo_departamento").val(municipio_control.municipioActual.codigo_departamento);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo_municipio").val(municipio_control.municipioActual.codigo_municipio);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+municipio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("municipio","seguridad","","form_municipio",formulario,"","",paraEventoTabla,idFilaTabla,municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	cargarCombosFK(municipio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(municipio_control.strRecargarFkTiposNinguno!=null && municipio_control.strRecargarFkTiposNinguno!='NINGUNO' && municipio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(municipio_control) {
		jQuery("#spanstrMensajeid").text(municipio_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(municipio_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(municipio_control.strMensajecodigo);		
		jQuery("#spanstrMensajemunicipio").text(municipio_control.strMensajemunicipio);		
		jQuery("#spanstrMensajedepartamento").text(municipio_control.strMensajedepartamento);		
		jQuery("#spanstrMensajecodigo_departamento").text(municipio_control.strMensajecodigo_departamento);		
		jQuery("#spanstrMensajecodigo_municipio").text(municipio_control.strMensajecodigo_municipio);		
	}
	
	actualizarCssBotonesMantenimiento(municipio_control) {
		jQuery("#tdbtnNuevomunicipio").css("visibility",municipio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevomunicipio").css("display",municipio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarmunicipio").css("visibility",municipio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarmunicipio").css("display",municipio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarmunicipio").css("visibility",municipio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarmunicipio").css("display",municipio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarmunicipio").css("visibility",municipio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosmunicipio").css("visibility",municipio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosmunicipio").css("display",municipio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(municipio_control) {
		var i=0;
		
		i=municipio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(municipio_control.municipioActual.id);
		jQuery("#t-version_row_"+i+"").val(municipio_control.municipioActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(municipio_control.municipioActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(municipio_control.municipioActual.municipio);
		jQuery("#t-cel_"+i+"_4").val(municipio_control.municipioActual.departamento);
		jQuery("#t-cel_"+i+"_5").val(municipio_control.municipioActual.codigo_departamento);
		jQuery("#t-cel_"+i+"_6").val(municipio_control.municipioActual.codigo_municipio);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(municipio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(municipio_control) {
		municipio_funcion1.registrarControlesTableValidacionEdition(municipio_control,municipio_webcontrol1,municipio_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipioConstante,strParametros);
		
		//municipio_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//municipio_control
		
	
	}
	
	onLoadCombosDefectoFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("municipio");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("municipio");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(municipio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
			
			if(municipio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,"municipio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			municipio_funcion1.validarFormularioJQuery(municipio_constante1);
			
			if(municipio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(municipio_control) {
		
		jQuery("#divBusquedamunicipioAjaxWebPart").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trmunicipioCabeceraBusquedas").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trBusquedamunicipio").css("display",municipio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportemunicipio").css("display",municipio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosmunicipio").attr("style",municipio_control.strPermisoMostrarTodos);
		
		if(municipio_control.strPermisoNuevo!=null) {
			jQuery("#tdmunicipioNuevo").css("display",municipio_control.strPermisoNuevo);
			jQuery("#tdmunicipioNuevoToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdmunicipioDuplicar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmunicipioDuplicarToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmunicipioNuevoGuardarCambios").css("display",municipio_control.strPermisoNuevo);
			jQuery("#tdmunicipioNuevoGuardarCambiosToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(municipio_control.strPermisoActualizar!=null) {
			jQuery("#tdmunicipioActualizarToolBar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmunicipioCopiar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmunicipioCopiarToolBar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmunicipioConEditar").css("display",municipio_control.strPermisoActualizar);
		}
		
		jQuery("#tdmunicipioEliminarToolBar").css("display",municipio_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdmunicipioGuardarCambios").css("display",municipio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdmunicipioGuardarCambiosToolBar").css("display",municipio_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trmunicipioElementos").css("display",municipio_control.strVisibleTablaElementos);
		
		jQuery("#trmunicipioAcciones").css("display",municipio_control.strVisibleTablaAcciones);
		jQuery("#trmunicipioParametrosAcciones").css("display",municipio_control.strVisibleTablaAcciones);
			
		jQuery("#tdmunicipioCerrarPagina").css("display",municipio_control.strPermisoPopup);		
		jQuery("#tdmunicipioCerrarPaginaToolBar").css("display",municipio_control.strPermisoPopup);
		//jQuery("#trmunicipioAccionesRelaciones").css("display",municipio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarEventosControles();
		
		if(municipio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			municipio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(municipio_constante1.STR_ES_RELACIONES=="true") {
			if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				municipio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(municipio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(municipio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				municipio_webcontrol1.onLoad();
				
			} else {
				if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
					if(municipio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
						//municipio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(municipio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(municipio_constante1.BIG_ID_ACTUAL,"municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
						//municipio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			municipio_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var municipio_webcontrol1=new municipio_webcontrol();

if(municipio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = municipio_webcontrol1.onLoadWindow; 
}

//</script>