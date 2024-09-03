//<script type="text/javascript" language="javascript">



//var paisJQueryPaginaWebInteraccion= function (pais_control) {
//this.,this.,this.

class pais_webcontrol extends pais_webcontrol_add {
	
	pais_control=null;
	pais_controlInicial=null;
	pais_controlAuxiliar=null;
		
	//if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(pais_control) {
		super();
		
		this.pais_control=pais_control;
	}
		
	actualizarVariablesPagina(pais_control) {
		
		if(pais_control.action=="index" || pais_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(pais_control);
			
		} else if(pais_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(pais_control);
		
		} else if(pais_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(pais_control);
		
		} else if(pais_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(pais_control);
		
		} else if(pais_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(pais_control);
			
		} else if(pais_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(pais_control);
			
		} else if(pais_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(pais_control);
		
		} else if(pais_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(pais_control);
		
		} else if(pais_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(pais_control);
		
		} else if(pais_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(pais_control);
		
		} else if(pais_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(pais_control);
		
		} else if(pais_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(pais_control);
		
		} else if(pais_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(pais_control);
		
		} else if(pais_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(pais_control);
		
		} else if(pais_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(pais_control);
		
		} else if(pais_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(pais_control);
		
		} else if(pais_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pais_control);
		
		} else if(pais_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pais_control);
		
		} else if(pais_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pais_control);
		
		} else if(pais_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(pais_control);
		
		} else if(pais_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(pais_control);
		
		} else if(pais_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(pais_control);
		
		} else if(pais_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(pais_control);
		
		} else if(pais_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pais_control);
		
		} else if(pais_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pais_control);
		
		} else if(pais_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(pais_control);
		
		} else if(pais_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(pais_control);
		
		} else if(pais_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pais_control);		
		
		} else if(pais_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(pais_control);		
		
		} else if(pais_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(pais_control);		
		
		} else if(pais_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control);		
		}
		else if(pais_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pais_control);		
		}
		else if(pais_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(pais_control.action + " Revisar Manejo");
			
			if(pais_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(pais_control);
				
				return;
			}
			
			//if(pais_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(pais_control);
			//}
			
			if(pais_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pais_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(pais_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(pais_control, false);			
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(pais_control);	
			}
			
			if(pais_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(pais_control);	
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(pais_control);
			}
			
			
			if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(pais_control);			
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(pais_control);
			}
			
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
			}
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(pais_control);
			}				
			
			if(pais_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control);
			}
			
			if(pais_control.usuarioActual!=null && pais_control.usuarioActual.field_strUserName!=null &&
			pais_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(pais_control);			
			}
		}
		
		
		if(pais_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(pais_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(pais_control) {
		
		this.actualizarPaginaCargaGeneral(pais_control);
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
		this.actualizarPaginaAreaBusquedas(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(pais_control) {
		
		this.actualizarPaginaCargaGeneral(pais_control);
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
		this.actualizarPaginaAreaBusquedas(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(pais_control) {
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(pais_control) {
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pais_control) {
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pais_control) {
		this.actualizarPaginaAbrirLink(pais_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);				
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(pais_control) {
		this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pais_control) {
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pais_control) {
		this.actualizarPaginaAbrirLink(pais_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(pais_control) {
		this.actualizarPaginaImprimir(pais_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pais_control) {
		this.actualizarPaginaImprimir(pais_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(pais_control) {
		//FORMULARIO
		if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pais_control);
			this.actualizarPaginaFormularioAdd(pais_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//COMBOS FK
		if(pais_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pais_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(pais_control) {
		//FORMULARIO
		if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pais_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);	
		//COMBOS FK
		if(pais_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pais_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(pais_control) {
		if(pais_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pais_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(pais_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(pais_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(pais_control) {
		if(pais_funcion1.esPaginaForm()==true) {
			window.opener.pais_webcontrol1.actualizarPaginaTablaDatos(pais_control);
		} else {
			this.actualizarPaginaTablaDatos(pais_control);
		}
	}
	
	actualizarPaginaAbrirLink(pais_control) {
		pais_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(pais_control.strAuxiliarUrlPagina);
				
		pais_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(pais_control.strAuxiliarTipo,pais_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(pais_control) {
		pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
			
		if(pais_funcion1.esPaginaForm()==true) {
			window.opener.pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(pais_control) {
		eval(pais_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(pais_control, mostrar) {
		
		if(mostrar==true) {
			pais_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				pais_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			pais_funcion1.mostrarDivMensaje(true,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		
		} else {
			pais_funcion1.mostrarDivMensaje(false,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(pais_control) {
	
		funcionGeneral.printWebPartPage("pais",pais_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarpaissAjaxWebPart").html(pais_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("pais",jQuery("#divTablaDatosReporteAuxiliarpaissAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(pais_control) {
		this.pais_controlInicial=pais_control;
			
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(pais_control.strStyleDivArbol,pais_control.strStyleDivContent
																,pais_control.strStyleDivOpcionesBanner,pais_control.strStyleDivExpandirColapsar
																,pais_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=pais_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",pais_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(pais_control) {
		jQuery("#divTablaDatospaissAjaxWebPart").html(pais_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospaiss=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(pais_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospaiss=jQuery("#tblTablaDatospaiss").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("pais",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',pais_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			pais_webcontrol1.registrarControlesTableEdition(pais_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		pais_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(pais_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(pais_control.paisActual!=null) {//form
			
			this.actualizarCamposFilaTabla(pais_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(pais_control) {
		this.actualizarCssBotonesPagina(pais_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(pais_control.tiposReportes,pais_control.tiposReporte
															 	,pais_control.tiposPaginacion,pais_control.tiposAcciones
																,pais_control.tiposColumnasSelect,pais_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(pais_control.tiposRelaciones,pais_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(pais_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(pais_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(pais_control);			
	}
	
	actualizarPaginaAreaBusquedas(pais_control) {
		jQuery("#divBusquedapaisAjaxWebPart").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trpaisCabeceraBusquedas").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trBusquedapais").css("display",pais_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(pais_control.htmlTablaOrderBy!=null
			&& pais_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypaisAjaxWebPart").html(pais_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//pais_webcontrol1.registrarOrderByActions();
			
		}
			
		if(pais_control.htmlTablaOrderByRel!=null
			&& pais_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpaisAjaxWebPart").html(pais_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(pais_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapaisAjaxWebPart").css("display","none");
			jQuery("#trpaisCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapais").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(pais_control) {
		jQuery("#tdpaisNuevo").css("display",pais_control.strPermisoNuevo);
		jQuery("#trpaisElementos").css("display",pais_control.strVisibleTablaElementos);
		jQuery("#trpaisAcciones").css("display",pais_control.strVisibleTablaAcciones);
		jQuery("#trpaisParametrosAcciones").css("display",pais_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(pais_control) {
	
		this.actualizarCssBotonesMantenimiento(pais_control);
				
		if(pais_control.paisActual!=null) {//form
			
			this.actualizarCamposFormulario(pais_control);			
		}
						
		this.actualizarSpanMensajesCampos(pais_control);
	}
	
	actualizarPaginaUsuarioInvitado(pais_control) {
	
		var indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(pais_control) {
		jQuery("#divResumenpaisActualAjaxWebPart").html(pais_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control) {
		jQuery("#divAccionesRelacionespaisAjaxWebPart").html(pais_control.htmlTablaAccionesRelaciones);
			
		pais_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(pais_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(pais_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(pais_control) {
		
		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",pais_control.strVisibleBusquedaPorCodigo);
			jQuery("#tblstrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",pais_control.strVisibleBusquedaPorCodigo);
		}

		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",pais_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",pais_control.strVisibleBusquedaPorNombre);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpais();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("pais","seguridad","",pais_funcion1,pais_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("pais",id,"seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(pais_control) {
	
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-id").val(pais_control.paisActual.id);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-version_row").val(pais_control.paisActual.versionRow);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-codigo").val(pais_control.paisActual.codigo);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-nombre").val(pais_control.paisActual.nombre);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-iva").val(pais_control.paisActual.iva);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+pais_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("pais","seguridad","","form_pais",formulario,"","",paraEventoTabla,idFilaTabla,pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	cargarCombosFK(pais_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(pais_control.strRecargarFkTiposNinguno!=null && pais_control.strRecargarFkTiposNinguno!='NINGUNO' && pais_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(pais_control) {
		jQuery("#spanstrMensajeid").text(pais_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(pais_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(pais_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(pais_control.strMensajenombre);		
		jQuery("#spanstrMensajeiva").text(pais_control.strMensajeiva);		
	}
	
	actualizarCssBotonesMantenimiento(pais_control) {
		jQuery("#tdbtnNuevopais").css("visibility",pais_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopais").css("display",pais_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpais").css("visibility",pais_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpais").css("display",pais_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpais").css("visibility",pais_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpais").css("display",pais_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpais").css("visibility",pais_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospais").css("visibility",pais_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospais").css("display",pais_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpais").css("visibility",pais_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpais").css("visibility",pais_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpais").css("visibility",pais_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacionparametro_general").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});
		jQuery("#imgdivrelacionsucursal").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParasucursals(idActual);
		});
		jQuery("#imgdivrelacionprovincia").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaprovinciaes(idActual);
		});
		jQuery("#imgdivrelacionempresa").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaempresas(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(pais_control) {
		var i=0;
		
		i=pais_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(pais_control.paisActual.id);
		jQuery("#t-version_row_"+i+"").val(pais_control.paisActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(pais_control.paisActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(pais_control.paisActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(pais_control.paisActual.iva);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(pais_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_general").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionparametro_general", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsucursal").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionsucursal", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParasucursals(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionprovincia").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionprovincia", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaprovinciaes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionempresa").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionempresa", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaempresas(idActual);
		});				
	}
		
	

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","dato_general_usuario","seguridad","",pais_funcion1,pais_webcontrol1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","cliente","seguridad","",pais_funcion1,pais_webcontrol1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","proveedor","seguridad","",pais_funcion1,pais_webcontrol1,"es","");
	}

	registrarSesionParaparametro_generales(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","parametro_general","seguridad","",pais_funcion1,pais_webcontrol1,"es","");
	}

	registrarSesionParasucursals(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","sucursal","seguridad","",pais_funcion1,pais_webcontrol1,"s","");
	}

	registrarSesionParaprovinciaes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","provincia","seguridad","",pais_funcion1,pais_webcontrol1,"es","");
	}

	registrarSesionParaempresas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","empresa","seguridad","",pais_funcion1,pais_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(pais_control) {
		pais_funcion1.registrarControlesTableValidacionEdition(pais_control,pais_webcontrol1,pais_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,paisConstante,strParametros);
		
		//pais_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//pais_control
		
	
	}
	
	onLoadCombosDefectoFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("pais");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("pais");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(pais_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
			if(pais_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,"pais");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("pais","BusquedaPorCodigo","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pais","BusquedaPorNombre","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("pais");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			pais_funcion1.validarFormularioJQuery(pais_constante1);
			
			if(pais_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("pais","seguridad","",pais_funcion1,pais_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(pais_control) {
		
		jQuery("#divBusquedapaisAjaxWebPart").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trpaisCabeceraBusquedas").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trBusquedapais").css("display",pais_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepais").css("display",pais_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospais").attr("style",pais_control.strPermisoMostrarTodos);
		
		if(pais_control.strPermisoNuevo!=null) {
			jQuery("#tdpaisNuevo").css("display",pais_control.strPermisoNuevo);
			jQuery("#tdpaisNuevoToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpaisDuplicar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaisDuplicarToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaisNuevoGuardarCambios").css("display",pais_control.strPermisoNuevo);
			jQuery("#tdpaisNuevoGuardarCambiosToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(pais_control.strPermisoActualizar!=null) {
			jQuery("#tdpaisActualizarToolBar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaisCopiar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaisCopiarToolBar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaisConEditar").css("display",pais_control.strPermisoActualizar);
		}
		
		jQuery("#tdpaisEliminarToolBar").css("display",pais_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdpaisGuardarCambios").css("display",pais_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpaisGuardarCambiosToolBar").css("display",pais_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trpaisElementos").css("display",pais_control.strVisibleTablaElementos);
		
		jQuery("#trpaisAcciones").css("display",pais_control.strVisibleTablaAcciones);
		jQuery("#trpaisParametrosAcciones").css("display",pais_control.strVisibleTablaAcciones);
			
		jQuery("#tdpaisCerrarPagina").css("display",pais_control.strPermisoPopup);		
		jQuery("#tdpaisCerrarPaginaToolBar").css("display",pais_control.strPermisoPopup);
		//jQuery("#trpaisAccionesRelaciones").css("display",pais_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("pais","seguridad","",pais_funcion1,pais_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarEventosControles();
		
		if(pais_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			pais_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(pais_constante1.STR_ES_RELACIONES=="true") {
			if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				pais_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(pais_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(pais_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				pais_webcontrol1.onLoad();
				
			} else {
				if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
					if(pais_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
						//pais_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(pais_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(pais_constante1.BIG_ID_ACTUAL,"pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
						//pais_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			pais_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var pais_webcontrol1=new pais_webcontrol();

if(pais_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = pais_webcontrol1.onLoadWindow; 
}

//</script>