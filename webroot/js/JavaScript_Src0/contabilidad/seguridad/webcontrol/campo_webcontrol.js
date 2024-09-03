//<script type="text/javascript" language="javascript">



//var campoJQueryPaginaWebInteraccion= function (campo_control) {
//this.,this.,this.

class campo_webcontrol extends campo_webcontrol_add {
	
	campo_control=null;
	campo_controlInicial=null;
	campo_controlAuxiliar=null;
		
	//if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(campo_control) {
		super();
		
		this.campo_control=campo_control;
	}
		
	actualizarVariablesPagina(campo_control) {
		
		if(campo_control.action=="index" || campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(campo_control);
			
		} else if(campo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(campo_control);
		
		} else if(campo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(campo_control);
		
		} else if(campo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(campo_control);
		
		} else if(campo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(campo_control);
			
		} else if(campo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(campo_control);
			
		} else if(campo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(campo_control);
		
		} else if(campo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(campo_control);
		
		} else if(campo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(campo_control);
		
		} else if(campo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(campo_control);
		
		} else if(campo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(campo_control);
		
		} else if(campo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(campo_control);
		
		} else if(campo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(campo_control);
		
		} else if(campo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(campo_control);
		
		} else if(campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(campo_control);
		
		} else if(campo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(campo_control);
		
		} else if(campo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(campo_control);
		
		} else if(campo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(campo_control);
		
		} else if(campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(campo_control);
		
		} else if(campo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(campo_control);
		
		} else if(campo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(campo_control);
		
		} else if(campo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(campo_control);
		
		} else if(campo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(campo_control);
		
		} else if(campo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(campo_control);
		
		} else if(campo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(campo_control);
		
		} else if(campo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(campo_control);
		
		} else if(campo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(campo_control);
		
		} else if(campo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(campo_control);		
		
		} else if(campo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(campo_control);		
		
		} else if(campo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(campo_control);		
		
		} else if(campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control);		
		}
		else if(campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(campo_control);		
		}
		else if(campo_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(campo_control);		
		}
		else if(campo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(campo_control.action + " Revisar Manejo");
			
			if(campo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(campo_control);
				
				return;
			}
			
			//if(campo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(campo_control);
			//}
			
			if(campo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && campo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(campo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(campo_control, false);			
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(campo_control);	
			}
			
			if(campo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(campo_control);	
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(campo_control);
			}
			
			
			if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(campo_control);			
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(campo_control);
			}
			
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
			}
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(campo_control);
			}				
			
			if(campo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control);
			}
			
			if(campo_control.usuarioActual!=null && campo_control.usuarioActual.field_strUserName!=null &&
			campo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(campo_control);			
			}
		}
		
		
		if(campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(campo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(campo_control) {
		
		this.actualizarPaginaCargaGeneral(campo_control);
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
		this.actualizarPaginaAreaBusquedas(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(campo_control) {
		
		this.actualizarPaginaCargaGeneral(campo_control);
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
		this.actualizarPaginaAreaBusquedas(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(campo_control) {
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(campo_control) {
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(campo_control) {
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(campo_control) {
		this.actualizarPaginaAbrirLink(campo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);				
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(campo_control) {
		this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(campo_control) {
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(campo_control) {
		this.actualizarPaginaAbrirLink(campo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(campo_control) {
		this.actualizarPaginaImprimir(campo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(campo_control) {
		this.actualizarPaginaImprimir(campo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);
			this.actualizarPaginaFormularioAdd(campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);	
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);	
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(campo_control) {
		if(campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(campo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(campo_control) {
		if(campo_funcion1.esPaginaForm()==true) {
			window.opener.campo_webcontrol1.actualizarPaginaTablaDatos(campo_control);
		} else {
			this.actualizarPaginaTablaDatos(campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(campo_control) {
		campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(campo_control.strAuxiliarUrlPagina);
				
		campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(campo_control.strAuxiliarTipo,campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(campo_control) {
		campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
			
		if(campo_funcion1.esPaginaForm()==true) {
			window.opener.campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(campo_control) {
		eval(campo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(campo_control, mostrar) {
		
		if(mostrar==true) {
			campo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				campo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			campo_funcion1.mostrarDivMensaje(true,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		
		} else {
			campo_funcion1.mostrarDivMensaje(false,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(campo_control) {
	
		funcionGeneral.printWebPartPage("campo",campo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcamposAjaxWebPart").html(campo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("campo",jQuery("#divTablaDatosReporteAuxiliarcamposAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(campo_control) {
		this.campo_controlInicial=campo_control;
			
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(campo_control.strStyleDivArbol,campo_control.strStyleDivContent
																,campo_control.strStyleDivOpcionesBanner,campo_control.strStyleDivExpandirColapsar
																,campo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=campo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",campo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(campo_control) {
		jQuery("#divTablaDatoscamposAjaxWebPart").html(campo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscampos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(campo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscampos=jQuery("#tblTablaDatoscampos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("campo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',campo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			campo_webcontrol1.registrarControlesTableEdition(campo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		campo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(campo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(campo_control.campoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(campo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(campo_control) {
		this.actualizarCssBotonesPagina(campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(campo_control.tiposReportes,campo_control.tiposReporte
															 	,campo_control.tiposPaginacion,campo_control.tiposAcciones
																,campo_control.tiposColumnasSelect,campo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(campo_control.tiposRelaciones,campo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(campo_control);			
	}
	
	actualizarPaginaAreaBusquedas(campo_control) {
		jQuery("#divBusquedacampoAjaxWebPart").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trcampoCabeceraBusquedas").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trBusquedacampo").css("display",campo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(campo_control.htmlTablaOrderBy!=null
			&& campo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycampoAjaxWebPart").html(campo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//campo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(campo_control.htmlTablaOrderByRel!=null
			&& campo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcampoAjaxWebPart").html(campo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(campo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacampoAjaxWebPart").css("display","none");
			jQuery("#trcampoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacampo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(campo_control) {
		jQuery("#tdcampoNuevo").css("display",campo_control.strPermisoNuevo);
		jQuery("#trcampoElementos").css("display",campo_control.strVisibleTablaElementos);
		jQuery("#trcampoAcciones").css("display",campo_control.strVisibleTablaAcciones);
		jQuery("#trcampoParametrosAcciones").css("display",campo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(campo_control) {
	
		this.actualizarCssBotonesMantenimiento(campo_control);
				
		if(campo_control.campoActual!=null) {//form
			
			this.actualizarCamposFormulario(campo_control);			
		}
						
		this.actualizarSpanMensajesCampos(campo_control);
	}
	
	actualizarPaginaUsuarioInvitado(campo_control) {
	
		var indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(campo_control) {
		jQuery("#divResumencampoActualAjaxWebPart").html(campo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control) {
		jQuery("#divAccionesRelacionescampoAjaxWebPart").html(campo_control.htmlTablaAccionesRelaciones);
			
		campo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(campo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(campo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(campo_control) {
		
		if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+campo_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",campo_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+campo_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",campo_control.strVisibleFK_Idopcion);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncampo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("campo","seguridad","",campo_funcion1,campo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("campo",id,"seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);		
	}
	
	

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("campo","opcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(campo_control) {
	
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-id").val(campo_control.campoActual.id);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-version_row").val(campo_control.campoActual.versionRow);
		
		if(campo_control.campoActual.id_opcion!=null && campo_control.campoActual.id_opcion>-1){
			if(jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != campo_control.campoActual.id_opcion) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(campo_control.campoActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-codigo").val(campo_control.campoActual.codigo);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-nombre").val(campo_control.campoActual.nombre);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-descripcion").val(campo_control.campoActual.descripcion);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-estado").prop('checked',campo_control.campoActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+campo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("campo","seguridad","","form_campo",formulario,"","",paraEventoTabla,idFilaTabla,campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	cargarCombosFK(campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.cargarCombosopcionsFK(campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(campo_control.strRecargarFkTiposNinguno!=null && campo_control.strRecargarFkTiposNinguno!='NINGUNO' && campo_control.strRecargarFkTiposNinguno!='') {
			
				if(campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTiposNinguno,",")) { 
					campo_webcontrol1.cargarCombosopcionsFK(campo_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(campo_control) {
		jQuery("#spanstrMensajeid").text(campo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(campo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_opcion").text(campo_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajecodigo").text(campo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(campo_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(campo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(campo_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(campo_control) {
		jQuery("#tdbtnNuevocampo").css("visibility",campo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocampo").css("display",campo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcampo").css("visibility",campo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcampo").css("display",campo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcampo").css("visibility",campo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcampo").css("display",campo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcampo").css("visibility",campo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscampo").css("visibility",campo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscampo").css("display",campo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcampo").css("visibility",campo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcampo").css("visibility",campo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcampo").css("visibility",campo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_campo").click(function(){

			var idActual=jQuery(this).attr("idactualcampo");

			campo_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,campo_funcion1,campo_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(campo_control) {
		var i=0;
		
		i=campo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(campo_control.campoActual.id);
		jQuery("#t-version_row_"+i+"").val(campo_control.campoActual.versionRow);
		
		if(campo_control.campoActual.id_opcion!=null && campo_control.campoActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != campo_control.campoActual.id_opcion) {
				jQuery("#t-cel_"+i+"_2").val(campo_control.campoActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(campo_control.campoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(campo_control.campoActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(campo_control.campoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").prop('checked',campo_control.campoActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(campo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_campo").click(function(){
		jQuery("#tblTablaDatoscampos").on("click",".imgrelacionperfil_campo", function () {

			var idActual=jQuery(this).attr("idactualcampo");

			campo_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_campos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"campo","perfil_campo","seguridad","",campo_funcion1,campo_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(campo_control) {
		campo_funcion1.registrarControlesTableValidacionEdition(campo_control,campo_webcontrol1,campo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campoConstante,strParametros);
		
		//campo_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosopcionsFK(campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+campo_constante1.STR_SUFIJO+"-id_opcion",campo_control.opcionsFK);

		if(campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+campo_control.idFilaTablaActual+"_2",campo_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",campo_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(campo_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(campo_control.idopcionDefaultFK>-1 && jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != campo_control.idopcionDefaultFK) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(campo_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(campo_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//campo_control
		
	
	}
	
	onLoadCombosDefectoFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.setDefectoValorCombosopcionsFK(campo_control);
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
	onLoadCombosEventosFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				campo_webcontrol1.registrarComboActionChangeCombosopcionsFK(campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("campo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("campo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(campo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
			if(campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,"campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				campo_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("campo","FK_Idopcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("campo");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			campo_funcion1.validarFormularioJQuery(campo_constante1);
			
			if(campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("campo","seguridad","",campo_funcion1,campo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(campo_control) {
		
		jQuery("#divBusquedacampoAjaxWebPart").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trcampoCabeceraBusquedas").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trBusquedacampo").css("display",campo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecampo").css("display",campo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscampo").attr("style",campo_control.strPermisoMostrarTodos);
		
		if(campo_control.strPermisoNuevo!=null) {
			jQuery("#tdcampoNuevo").css("display",campo_control.strPermisoNuevo);
			jQuery("#tdcampoNuevoToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcampoDuplicar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcampoDuplicarToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcampoNuevoGuardarCambios").css("display",campo_control.strPermisoNuevo);
			jQuery("#tdcampoNuevoGuardarCambiosToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(campo_control.strPermisoActualizar!=null) {
			jQuery("#tdcampoActualizarToolBar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcampoCopiar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcampoCopiarToolBar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcampoConEditar").css("display",campo_control.strPermisoActualizar);
		}
		
		jQuery("#tdcampoEliminarToolBar").css("display",campo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcampoGuardarCambios").css("display",campo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcampoGuardarCambiosToolBar").css("display",campo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcampoElementos").css("display",campo_control.strVisibleTablaElementos);
		
		jQuery("#trcampoAcciones").css("display",campo_control.strVisibleTablaAcciones);
		jQuery("#trcampoParametrosAcciones").css("display",campo_control.strVisibleTablaAcciones);
			
		jQuery("#tdcampoCerrarPagina").css("display",campo_control.strPermisoPopup);		
		jQuery("#tdcampoCerrarPaginaToolBar").css("display",campo_control.strPermisoPopup);
		//jQuery("#trcampoAccionesRelaciones").css("display",campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("campo","seguridad","",campo_funcion1,campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarEventosControles();
		
		if(campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(campo_constante1.STR_ES_RELACIONES=="true") {
			if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				campo_webcontrol1.onLoad();
				
			} else {
				if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(campo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
						//campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(campo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(campo_constante1.BIG_ID_ACTUAL,"campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
						//campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			campo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var campo_webcontrol1=new campo_webcontrol();

if(campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = campo_webcontrol1.onLoadWindow; 
}

//</script>