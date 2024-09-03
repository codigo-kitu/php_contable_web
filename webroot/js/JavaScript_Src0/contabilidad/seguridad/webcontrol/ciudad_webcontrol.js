//<script type="text/javascript" language="javascript">



//var ciudadJQueryPaginaWebInteraccion= function (ciudad_control) {
//this.,this.,this.

class ciudad_webcontrol extends ciudad_webcontrol_add {
	
	ciudad_control=null;
	ciudad_controlInicial=null;
	ciudad_controlAuxiliar=null;
		
	//if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ciudad_control) {
		super();
		
		this.ciudad_control=ciudad_control;
	}
		
	actualizarVariablesPagina(ciudad_control) {
		
		if(ciudad_control.action=="index" || ciudad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ciudad_control);
			
		} else if(ciudad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(ciudad_control);
		
		} else if(ciudad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(ciudad_control);
		
		} else if(ciudad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(ciudad_control);
		
		} else if(ciudad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(ciudad_control);
			
		} else if(ciudad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(ciudad_control);
			
		} else if(ciudad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(ciudad_control);
		
		} else if(ciudad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(ciudad_control);
		
		} else if(ciudad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(ciudad_control);
		
		} else if(ciudad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(ciudad_control);
		
		} else if(ciudad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(ciudad_control);
		
		} else if(ciudad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(ciudad_control);
		
		} else if(ciudad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(ciudad_control);
		
		} else if(ciudad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ciudad_control);
		
		} else if(ciudad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(ciudad_control);
		
		} else if(ciudad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(ciudad_control);
		
		} else if(ciudad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(ciudad_control);
		
		} else if(ciudad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ciudad_control);		
		
		} else if(ciudad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(ciudad_control);		
		
		} else if(ciudad_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(ciudad_control);		
		
		} else if(ciudad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control);		
		}
		else if(ciudad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ciudad_control);		
		}
		else if(ciudad_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(ciudad_control);		
		}
		else if(ciudad_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(ciudad_control.action + " Revisar Manejo");
			
			if(ciudad_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(ciudad_control);
				
				return;
			}
			
			//if(ciudad_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(ciudad_control);
			//}
			
			if(ciudad_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ciudad_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(ciudad_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(ciudad_control, false);			
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(ciudad_control);	
			}
			
			if(ciudad_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(ciudad_control);	
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(ciudad_control);
			}
			
			
			if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(ciudad_control);			
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(ciudad_control);
			}
			
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
			}
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(ciudad_control);
			}				
			
			if(ciudad_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control);
			}
			
			if(ciudad_control.usuarioActual!=null && ciudad_control.usuarioActual.field_strUserName!=null &&
			ciudad_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(ciudad_control);			
			}
		}
		
		
		if(ciudad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ciudad_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(ciudad_control) {
		
		this.actualizarPaginaCargaGeneral(ciudad_control);
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
		this.actualizarPaginaAreaBusquedas(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(ciudad_control) {
		
		this.actualizarPaginaCargaGeneral(ciudad_control);
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
		this.actualizarPaginaAreaBusquedas(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(ciudad_control) {
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(ciudad_control) {
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ciudad_control) {
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ciudad_control) {
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);				
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(ciudad_control) {
		this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ciudad_control) {
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ciudad_control) {
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(ciudad_control) {
		this.actualizarPaginaImprimir(ciudad_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ciudad_control) {
		this.actualizarPaginaImprimir(ciudad_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);
			this.actualizarPaginaFormularioAdd(ciudad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);	
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(ciudad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);	
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(ciudad_control) {
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ciudad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ciudad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ciudad_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ciudad_control) {
		if(ciudad_funcion1.esPaginaForm()==true) {
			window.opener.ciudad_webcontrol1.actualizarPaginaTablaDatos(ciudad_control);
		} else {
			this.actualizarPaginaTablaDatos(ciudad_control);
		}
	}
	
	actualizarPaginaAbrirLink(ciudad_control) {
		ciudad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ciudad_control.strAuxiliarUrlPagina);
				
		ciudad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ciudad_control.strAuxiliarTipo,ciudad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ciudad_control) {
		ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
			
		if(ciudad_funcion1.esPaginaForm()==true) {
			window.opener.ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(ciudad_control) {
		eval(ciudad_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(ciudad_control, mostrar) {
		
		if(mostrar==true) {
			ciudad_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ciudad_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			ciudad_funcion1.mostrarDivMensaje(true,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		
		} else {
			ciudad_funcion1.mostrarDivMensaje(false,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(ciudad_control) {
	
		funcionGeneral.printWebPartPage("ciudad",ciudad_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarciudadsAjaxWebPart").html(ciudad_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("ciudad",jQuery("#divTablaDatosReporteAuxiliarciudadsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(ciudad_control) {
		this.ciudad_controlInicial=ciudad_control;
			
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ciudad_control.strStyleDivArbol,ciudad_control.strStyleDivContent
																,ciudad_control.strStyleDivOpcionesBanner,ciudad_control.strStyleDivExpandirColapsar
																,ciudad_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=ciudad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",ciudad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(ciudad_control) {
		jQuery("#divTablaDatosciudadsAjaxWebPart").html(ciudad_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosciudads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosciudads=jQuery("#tblTablaDatosciudads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("ciudad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',ciudad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			ciudad_webcontrol1.registrarControlesTableEdition(ciudad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		ciudad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(ciudad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(ciudad_control.ciudadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(ciudad_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(ciudad_control) {
		this.actualizarCssBotonesPagina(ciudad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ciudad_control.tiposReportes,ciudad_control.tiposReporte
															 	,ciudad_control.tiposPaginacion,ciudad_control.tiposAcciones
																,ciudad_control.tiposColumnasSelect,ciudad_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(ciudad_control.tiposRelaciones,ciudad_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(ciudad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ciudad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ciudad_control);			
	}
	
	actualizarPaginaAreaBusquedas(ciudad_control) {
		jQuery("#divBusquedaciudadAjaxWebPart").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trciudadCabeceraBusquedas").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trBusquedaciudad").css("display",ciudad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(ciudad_control.htmlTablaOrderBy!=null
			&& ciudad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByciudadAjaxWebPart").html(ciudad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//ciudad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(ciudad_control.htmlTablaOrderByRel!=null
			&& ciudad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelciudadAjaxWebPart").html(ciudad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(ciudad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaciudadAjaxWebPart").css("display","none");
			jQuery("#trciudadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaciudad").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(ciudad_control) {
		jQuery("#tdciudadNuevo").css("display",ciudad_control.strPermisoNuevo);
		jQuery("#trciudadElementos").css("display",ciudad_control.strVisibleTablaElementos);
		jQuery("#trciudadAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
		jQuery("#trciudadParametrosAcciones").css("display",ciudad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(ciudad_control) {
	
		this.actualizarCssBotonesMantenimiento(ciudad_control);
				
		if(ciudad_control.ciudadActual!=null) {//form
			
			this.actualizarCamposFormulario(ciudad_control);			
		}
						
		this.actualizarSpanMensajesCampos(ciudad_control);
	}
	
	actualizarPaginaUsuarioInvitado(ciudad_control) {
	
		var indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(ciudad_control) {
		jQuery("#divResumenciudadActualAjaxWebPart").html(ciudad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control) {
		jQuery("#divAccionesRelacionesciudadAjaxWebPart").html(ciudad_control.htmlTablaAccionesRelaciones);
			
		ciudad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(ciudad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(ciudad_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(ciudad_control) {
		
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",ciudad_control.strVisibleBusquedaPorCodigo);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",ciudad_control.strVisibleBusquedaPorCodigo);
		}

		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",ciudad_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",ciudad_control.strVisibleBusquedaPorNombre);
		}

		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",ciudad_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",ciudad_control.strVisibleFK_Idprovincia);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionciudad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("ciudad",id,"seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);		
	}
	
	

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		ciudad_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("ciudad","provincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(ciudad_control) {
	
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id").val(ciudad_control.ciudadActual.id);
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-version_row").val(ciudad_control.ciudadActual.versionRow);
		
		if(ciudad_control.ciudadActual.id_provincia!=null && ciudad_control.ciudadActual.id_provincia>-1){
			if(jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != ciudad_control.ciudadActual.id_provincia) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(ciudad_control.ciudadActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-codigo").val(ciudad_control.ciudadActual.codigo);
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-nombre").val(ciudad_control.ciudadActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+ciudad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("ciudad","seguridad","","form_ciudad",formulario,"","",paraEventoTabla,idFilaTabla,ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	cargarCombosFK(ciudad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ciudad_control.strRecargarFkTiposNinguno!=null && ciudad_control.strRecargarFkTiposNinguno!='NINGUNO' && ciudad_control.strRecargarFkTiposNinguno!='') {
			
				if(ciudad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTiposNinguno,",")) { 
					ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(ciudad_control) {
		jQuery("#spanstrMensajeid").text(ciudad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(ciudad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_provincia").text(ciudad_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajecodigo").text(ciudad_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(ciudad_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(ciudad_control) {
		jQuery("#tdbtnNuevociudad").css("visibility",ciudad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevociudad").css("display",ciudad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarciudad").css("visibility",ciudad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarciudad").css("display",ciudad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarciudad").css("visibility",ciudad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarciudad").css("display",ciudad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarciudad").css("visibility",ciudad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosciudad").css("visibility",ciudad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosciudad").css("display",ciudad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacionsucursal").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParasucursals(idActual);
		});
		jQuery("#imgdivrelacionempresa").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaempresas(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaprovinciaFK(ciudad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,ciudad_funcion1,ciudad_control.provinciasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(ciudad_control) {
		var i=0;
		
		i=ciudad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(ciudad_control.ciudadActual.id);
		jQuery("#t-version_row_"+i+"").val(ciudad_control.ciudadActual.versionRow);
		
		if(ciudad_control.ciudadActual.id_provincia!=null && ciudad_control.ciudadActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != ciudad_control.ciudadActual.id_provincia) {
				jQuery("#t-cel_"+i+"_2").val(ciudad_control.ciudadActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(ciudad_control.ciudadActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(ciudad_control.ciudadActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(ciudad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsucursal").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionsucursal", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParasucursals(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionempresa").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionempresa", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaempresas(idActual);
		});				
	}
		
	

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","dato_general_usuario","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","cliente","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","proveedor","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"es","");
	}

	registrarSesionParasucursals(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","sucursal","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"s","");
	}

	registrarSesionParaempresas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","empresa","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(ciudad_control) {
		ciudad_funcion1.registrarControlesTableValidacionEdition(ciudad_control,ciudad_webcontrol1,ciudad_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudadConstante,strParametros);
		
		//ciudad_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosprovinciasFK(ciudad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia",ciudad_control.provinciasFK);

		if(ciudad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+ciudad_control.idFilaTablaActual+"_2",ciudad_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",ciudad_control.provinciasFK);

	};

	
	
	registrarComboActionChangeCombosprovinciasFK(ciudad_control) {

	};

	
	
	setDefectoValorCombosprovinciasFK(ciudad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(ciudad_control.idprovinciaDefaultFK>-1 && jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != ciudad_control.idprovinciaDefaultFK) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(ciudad_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(ciudad_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ciudad_control
		
	
	}
	
	onLoadCombosDefectoFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.setDefectoValorCombosprovinciasFK(ciudad_control);
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
	onLoadCombosEventosFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				ciudad_webcontrol1.registrarComboActionChangeCombosprovinciasFK(ciudad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ciudad");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ciudad");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(ciudad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
			if(ciudad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"ciudad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				ciudad_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","BusquedaPorCodigo","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","BusquedaPorNombre","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","FK_Idprovincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("ciudad");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			ciudad_funcion1.validarFormularioJQuery(ciudad_constante1);
			
			if(ciudad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ciudad_control) {
		
		jQuery("#divBusquedaciudadAjaxWebPart").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trciudadCabeceraBusquedas").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trBusquedaciudad").css("display",ciudad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteciudad").css("display",ciudad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosciudad").attr("style",ciudad_control.strPermisoMostrarTodos);
		
		if(ciudad_control.strPermisoNuevo!=null) {
			jQuery("#tdciudadNuevo").css("display",ciudad_control.strPermisoNuevo);
			jQuery("#tdciudadNuevoToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdciudadDuplicar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdciudadDuplicarToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdciudadNuevoGuardarCambios").css("display",ciudad_control.strPermisoNuevo);
			jQuery("#tdciudadNuevoGuardarCambiosToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(ciudad_control.strPermisoActualizar!=null) {
			jQuery("#tdciudadActualizarToolBar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdciudadCopiar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdciudadCopiarToolBar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdciudadConEditar").css("display",ciudad_control.strPermisoActualizar);
		}
		
		jQuery("#tdciudadEliminarToolBar").css("display",ciudad_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdciudadGuardarCambios").css("display",ciudad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdciudadGuardarCambiosToolBar").css("display",ciudad_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trciudadElementos").css("display",ciudad_control.strVisibleTablaElementos);
		
		jQuery("#trciudadAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
		jQuery("#trciudadParametrosAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
			
		jQuery("#tdciudadCerrarPagina").css("display",ciudad_control.strPermisoPopup);		
		jQuery("#tdciudadCerrarPaginaToolBar").css("display",ciudad_control.strPermisoPopup);
		//jQuery("#trciudadAccionesRelaciones").css("display",ciudad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarEventosControles();
		
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			ciudad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ciudad_constante1.STR_ES_RELACIONES=="true") {
			if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				ciudad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ciudad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(ciudad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				ciudad_webcontrol1.onLoad();
				
			} else {
				if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
					if(ciudad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
						//ciudad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(ciudad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(ciudad_constante1.BIG_ID_ACTUAL,"ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
						//ciudad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			ciudad_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var ciudad_webcontrol1=new ciudad_webcontrol();

if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ciudad_webcontrol1.onLoadWindow; 
}

//</script>