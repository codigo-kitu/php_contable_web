//<script type="text/javascript" language="javascript">



//var unidadJQueryPaginaWebInteraccion= function (unidad_control) {
//this.,this.,this.

class unidad_webcontrol extends unidad_webcontrol_add {
	
	unidad_control=null;
	unidad_controlInicial=null;
	unidad_controlAuxiliar=null;
		
	//if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(unidad_control) {
		super();
		
		this.unidad_control=unidad_control;
	}
		
	actualizarVariablesPagina(unidad_control) {
		
		if(unidad_control.action=="index" || unidad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(unidad_control);
			
		} else if(unidad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(unidad_control);
		
		} else if(unidad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(unidad_control);
		
		} else if(unidad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(unidad_control);
		
		} else if(unidad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(unidad_control);
			
		} else if(unidad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(unidad_control);
			
		} else if(unidad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(unidad_control);
		
		} else if(unidad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(unidad_control);
		
		} else if(unidad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(unidad_control);
		
		} else if(unidad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(unidad_control);
		
		} else if(unidad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(unidad_control);
		
		} else if(unidad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(unidad_control);
		
		} else if(unidad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(unidad_control);
		
		} else if(unidad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(unidad_control);
		
		} else if(unidad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(unidad_control);
		
		} else if(unidad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(unidad_control);
		
		} else if(unidad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(unidad_control);
		
		} else if(unidad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(unidad_control);
		
		} else if(unidad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(unidad_control);
		
		} else if(unidad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(unidad_control);
		
		} else if(unidad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(unidad_control);
		
		} else if(unidad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(unidad_control);
		
		} else if(unidad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(unidad_control);
		
		} else if(unidad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(unidad_control);		
		
		} else if(unidad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(unidad_control);		
		
		} else if(unidad_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(unidad_control);		
		
		} else if(unidad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control);		
		}
		else if(unidad_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(unidad_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(unidad_control.action + " Revisar Manejo");
			
			if(unidad_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(unidad_control);
				
				return;
			}
			
			//if(unidad_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(unidad_control);
			//}
			
			if(unidad_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && unidad_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(unidad_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(unidad_control, false);			
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(unidad_control);	
			}
			
			if(unidad_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(unidad_control);	
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(unidad_control);
			}
			
			
			if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(unidad_control);			
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(unidad_control);
			}
			
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
			}
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(unidad_control);
			}				
			
			if(unidad_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(unidad_control);
			}
			
			if(unidad_control.usuarioActual!=null && unidad_control.usuarioActual.field_strUserName!=null &&
			unidad_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(unidad_control);			
			}
		}
		
		
		if(unidad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(unidad_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(unidad_control) {
		
		this.actualizarPaginaCargaGeneral(unidad_control);
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
		this.actualizarPaginaAreaBusquedas(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(unidad_control) {
		
		this.actualizarPaginaCargaGeneral(unidad_control);
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
		this.actualizarPaginaAreaBusquedas(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(unidad_control) {
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(unidad_control) {
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(unidad_control) {
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(unidad_control) {
		this.actualizarPaginaAbrirLink(unidad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);				
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(unidad_control) {
		this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(unidad_control) {
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(unidad_control) {
		this.actualizarPaginaAbrirLink(unidad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(unidad_control) {
		this.actualizarPaginaImprimir(unidad_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(unidad_control) {
		this.actualizarPaginaImprimir(unidad_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);
			this.actualizarPaginaFormularioAdd(unidad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);	
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(unidad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);	
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(unidad_control) {
		if(unidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && unidad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(unidad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(unidad_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(unidad_control) {
		if(unidad_funcion1.esPaginaForm()==true) {
			window.opener.unidad_webcontrol1.actualizarPaginaTablaDatos(unidad_control);
		} else {
			this.actualizarPaginaTablaDatos(unidad_control);
		}
	}
	
	actualizarPaginaAbrirLink(unidad_control) {
		unidad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(unidad_control.strAuxiliarUrlPagina);
				
		unidad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(unidad_control.strAuxiliarTipo,unidad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(unidad_control) {
		unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
			
		if(unidad_funcion1.esPaginaForm()==true) {
			window.opener.unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(unidad_control) {
		eval(unidad_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(unidad_control, mostrar) {
		
		if(mostrar==true) {
			unidad_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				unidad_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			unidad_funcion1.mostrarDivMensaje(true,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		
		} else {
			unidad_funcion1.mostrarDivMensaje(false,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(unidad_control) {
	
		funcionGeneral.printWebPartPage("unidad",unidad_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarunidadsAjaxWebPart").html(unidad_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("unidad",jQuery("#divTablaDatosReporteAuxiliarunidadsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(unidad_control) {
		this.unidad_controlInicial=unidad_control;
			
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(unidad_control.strStyleDivArbol,unidad_control.strStyleDivContent
																,unidad_control.strStyleDivOpcionesBanner,unidad_control.strStyleDivExpandirColapsar
																,unidad_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=unidad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",unidad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(unidad_control) {
		jQuery("#divTablaDatosunidadsAjaxWebPart").html(unidad_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosunidads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(unidad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosunidads=jQuery("#tblTablaDatosunidads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("unidad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',unidad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			unidad_webcontrol1.registrarControlesTableEdition(unidad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		unidad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(unidad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(unidad_control.unidadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(unidad_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(unidad_control) {
		this.actualizarCssBotonesPagina(unidad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(unidad_control.tiposReportes,unidad_control.tiposReporte
															 	,unidad_control.tiposPaginacion,unidad_control.tiposAcciones
																,unidad_control.tiposColumnasSelect,unidad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(unidad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(unidad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(unidad_control);			
	}
	
	actualizarPaginaAreaBusquedas(unidad_control) {
		jQuery("#divBusquedaunidadAjaxWebPart").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trunidadCabeceraBusquedas").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaunidad").css("display",unidad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(unidad_control.htmlTablaOrderBy!=null
			&& unidad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByunidadAjaxWebPart").html(unidad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//unidad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(unidad_control.htmlTablaOrderByRel!=null
			&& unidad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelunidadAjaxWebPart").html(unidad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(unidad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaunidadAjaxWebPart").css("display","none");
			jQuery("#trunidadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaunidad").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(unidad_control) {
		jQuery("#tdunidadNuevo").css("display",unidad_control.strPermisoNuevo);
		jQuery("#trunidadElementos").css("display",unidad_control.strVisibleTablaElementos);
		jQuery("#trunidadAcciones").css("display",unidad_control.strVisibleTablaAcciones);
		jQuery("#trunidadParametrosAcciones").css("display",unidad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(unidad_control) {
	
		this.actualizarCssBotonesMantenimiento(unidad_control);
				
		if(unidad_control.unidadActual!=null) {//form
			
			this.actualizarCamposFormulario(unidad_control);			
		}
						
		this.actualizarSpanMensajesCampos(unidad_control);
	}
	
	actualizarPaginaUsuarioInvitado(unidad_control) {
	
		var indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(unidad_control) {
		jQuery("#divResumenunidadActualAjaxWebPart").html(unidad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(unidad_control) {
		jQuery("#divAccionesRelacionesunidadAjaxWebPart").html(unidad_control.htmlTablaAccionesRelaciones);
			
		unidad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(unidad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(unidad_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(unidad_control) {
		
		if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+unidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",unidad_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+unidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",unidad_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionunidad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("unidad",id,"inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		unidad_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("unidad","empresa","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(unidad_control) {
	
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id").val(unidad_control.unidadActual.id);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-version_row").val(unidad_control.unidadActual.versionRow);
		
		if(unidad_control.unidadActual.id_empresa!=null && unidad_control.unidadActual.id_empresa>-1){
			if(jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != unidad_control.unidadActual.id_empresa) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(unidad_control.unidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-codigo").val(unidad_control.unidadActual.codigo);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-nombre").val(unidad_control.unidadActual.nombre);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-predeterminado_venta").prop('checked',unidad_control.unidadActual.predeterminado_venta);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-predeterminado_compra").prop('checked',unidad_control.unidadActual.predeterminado_compra);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-nro_productos").val(unidad_control.unidadActual.nro_productos);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+unidad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("unidad","inventario","","form_unidad",formulario,"","",paraEventoTabla,idFilaTabla,unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	cargarCombosFK(unidad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(unidad_control.strRecargarFkTiposNinguno!=null && unidad_control.strRecargarFkTiposNinguno!='NINGUNO' && unidad_control.strRecargarFkTiposNinguno!='') {
			
				if(unidad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTiposNinguno,",")) { 
					unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(unidad_control) {
		jQuery("#spanstrMensajeid").text(unidad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(unidad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(unidad_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(unidad_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(unidad_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado_venta").text(unidad_control.strMensajepredeterminado_venta);		
		jQuery("#spanstrMensajepredeterminado_compra").text(unidad_control.strMensajepredeterminado_compra);		
		jQuery("#spanstrMensajenro_productos").text(unidad_control.strMensajenro_productos);		
	}
	
	actualizarCssBotonesMantenimiento(unidad_control) {
		jQuery("#tdbtnNuevounidad").css("visibility",unidad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevounidad").css("display",unidad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarunidad").css("visibility",unidad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarunidad").css("display",unidad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarunidad").css("visibility",unidad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarunidad").css("display",unidad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarunidad").css("visibility",unidad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosunidad").css("visibility",unidad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosunidad").css("display",unidad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(unidad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,unidad_funcion1,unidad_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(unidad_control) {
		var i=0;
		
		i=unidad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(unidad_control.unidadActual.id);
		jQuery("#t-version_row_"+i+"").val(unidad_control.unidadActual.versionRow);
		
		if(unidad_control.unidadActual.id_empresa!=null && unidad_control.unidadActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != unidad_control.unidadActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(unidad_control.unidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(unidad_control.unidadActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(unidad_control.unidadActual.nombre);
		jQuery("#t-cel_"+i+"_5").prop('checked',unidad_control.unidadActual.predeterminado_venta);
		jQuery("#t-cel_"+i+"_6").prop('checked',unidad_control.unidadActual.predeterminado_compra);
		jQuery("#t-cel_"+i+"_7").val(unidad_control.unidadActual.nro_productos);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(unidad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(unidad_control) {
		unidad_funcion1.registrarControlesTableValidacionEdition(unidad_control,unidad_webcontrol1,unidad_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidadConstante,strParametros);
		
		//unidad_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(unidad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa",unidad_control.empresasFK);

		if(unidad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+unidad_control.idFilaTablaActual+"_2",unidad_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(unidad_control) {

	};

	
	
	setDefectoValorCombosempresasFK(unidad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(unidad_control.idempresaDefaultFK>-1 && jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != unidad_control.idempresaDefaultFK) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(unidad_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//unidad_control
		
	
	}
	
	onLoadCombosDefectoFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.setDefectoValorCombosempresasFK(unidad_control);
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
	onLoadCombosEventosFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				unidad_webcontrol1.registrarComboActionChangeCombosempresasFK(unidad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("unidad");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("unidad");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(unidad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
			
			if(unidad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,"unidad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				unidad_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("unidad","FK_Idempresa","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			unidad_funcion1.validarFormularioJQuery(unidad_constante1);
			
			if(unidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(unidad_control) {
		
		jQuery("#divBusquedaunidadAjaxWebPart").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trunidadCabeceraBusquedas").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaunidad").css("display",unidad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteunidad").css("display",unidad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosunidad").attr("style",unidad_control.strPermisoMostrarTodos);
		
		if(unidad_control.strPermisoNuevo!=null) {
			jQuery("#tdunidadNuevo").css("display",unidad_control.strPermisoNuevo);
			jQuery("#tdunidadNuevoToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdunidadDuplicar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdunidadDuplicarToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdunidadNuevoGuardarCambios").css("display",unidad_control.strPermisoNuevo);
			jQuery("#tdunidadNuevoGuardarCambiosToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(unidad_control.strPermisoActualizar!=null) {
			jQuery("#tdunidadActualizarToolBar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdunidadCopiar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdunidadCopiarToolBar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdunidadConEditar").css("display",unidad_control.strPermisoActualizar);
		}
		
		jQuery("#tdunidadEliminarToolBar").css("display",unidad_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdunidadGuardarCambios").css("display",unidad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdunidadGuardarCambiosToolBar").css("display",unidad_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trunidadElementos").css("display",unidad_control.strVisibleTablaElementos);
		
		jQuery("#trunidadAcciones").css("display",unidad_control.strVisibleTablaAcciones);
		jQuery("#trunidadParametrosAcciones").css("display",unidad_control.strVisibleTablaAcciones);
			
		jQuery("#tdunidadCerrarPagina").css("display",unidad_control.strPermisoPopup);		
		jQuery("#tdunidadCerrarPaginaToolBar").css("display",unidad_control.strPermisoPopup);
		//jQuery("#trunidadAccionesRelaciones").css("display",unidad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarEventosControles();
		
		if(unidad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			unidad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(unidad_constante1.STR_ES_RELACIONES=="true") {
			if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				unidad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(unidad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(unidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				unidad_webcontrol1.onLoad();
				
			} else {
				if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
					if(unidad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
						//unidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(unidad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(unidad_constante1.BIG_ID_ACTUAL,"unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
						//unidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			unidad_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var unidad_webcontrol1=new unidad_webcontrol();

if(unidad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = unidad_webcontrol1.onLoadWindow; 
}

//</script>