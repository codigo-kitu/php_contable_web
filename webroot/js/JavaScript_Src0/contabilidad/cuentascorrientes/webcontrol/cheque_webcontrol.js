//<script type="text/javascript" language="javascript">



//var chequeJQueryPaginaWebInteraccion= function (cheque_control) {
//this.,this.,this.

class cheque_webcontrol extends cheque_webcontrol_add {
	
	cheque_control=null;
	cheque_controlInicial=null;
	cheque_controlAuxiliar=null;
		
	//if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cheque_control) {
		super();
		
		this.cheque_control=cheque_control;
	}
		
	actualizarVariablesPagina(cheque_control) {
		
		if(cheque_control.action=="index" || cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cheque_control);
			
		} else if(cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cheque_control);
		
		} else if(cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cheque_control);
		
		} else if(cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cheque_control);
		
		} else if(cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cheque_control);
			
		} else if(cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cheque_control);
			
		} else if(cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cheque_control);
		
		} else if(cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cheque_control);
		
		} else if(cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cheque_control);
		
		} else if(cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cheque_control);
		
		} else if(cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cheque_control);
		
		} else if(cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cheque_control);
		
		} else if(cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cheque_control);
		
		} else if(cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cheque_control);
		
		} else if(cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cheque_control);
		
		} else if(cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cheque_control);
		
		} else if(cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cheque_control);
		
		} else if(cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cheque_control);
		
		} else if(cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cheque_control);
		
		} else if(cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cheque_control);
		
		} else if(cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cheque_control);
		
		} else if(cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cheque_control);
		
		} else if(cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cheque_control);
		
		} else if(cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cheque_control);
		
		} else if(cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cheque_control);
		
		} else if(cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cheque_control);
		
		} else if(cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cheque_control);
		
		} else if(cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cheque_control);		
		
		} else if(cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cheque_control);		
		
		} else if(cheque_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cheque_control);		
		
		} else if(cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_control);		
		}
		else if(cheque_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cheque_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cheque_control.action + " Revisar Manejo");
			
			if(cheque_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cheque_control);
				
				return;
			}
			
			//if(cheque_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cheque_control);
			//}
			
			if(cheque_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cheque_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cheque_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cheque_control, false);			
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cheque_control);	
			}
			
			if(cheque_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cheque_control);	
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cheque_control);
			}
			
			
			if(cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cheque_control);			
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cheque_control);
			}
			
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cheque_control);
			}
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cheque_control);
			}				
			
			if(cheque_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cheque_control);
			}
			
			if(cheque_control.usuarioActual!=null && cheque_control.usuarioActual.field_strUserName!=null &&
			cheque_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cheque_control);			
			}
		}
		
		
		if(cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cheque_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cheque_control) {
		
		this.actualizarPaginaCargaGeneral(cheque_control);
		this.actualizarPaginaTablaDatos(cheque_control);
		this.actualizarPaginaCargaGeneralControles(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cheque_control);
		this.actualizarPaginaAreaBusquedas(cheque_control);
		this.actualizarPaginaCargaCombosFK(cheque_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cheque_control) {
		
		this.actualizarPaginaCargaGeneral(cheque_control);
		this.actualizarPaginaTablaDatos(cheque_control);
		this.actualizarPaginaCargaGeneralControles(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cheque_control);
		this.actualizarPaginaAreaBusquedas(cheque_control);
		this.actualizarPaginaCargaCombosFK(cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cheque_control) {
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cheque_control) {
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cheque_control) {
		this.actualizarPaginaCargaGeneralControles(cheque_control);
		this.actualizarPaginaCargaCombosFK(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cheque_control) {
		this.actualizarPaginaAbrirLink(cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);				
		this.actualizarPaginaFormulario(cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cheque_control) {
		this.actualizarPaginaFormulario(cheque_control);
		this.onLoadCombosDefectoFK(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);
		this.onLoadCombosDefectoFK(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cheque_control) {
		this.actualizarPaginaCargaGeneralControles(cheque_control);
		this.actualizarPaginaCargaCombosFK(cheque_control);
		this.actualizarPaginaFormulario(cheque_control);
		this.onLoadCombosDefectoFK(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cheque_control) {
		this.actualizarPaginaAbrirLink(cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cheque_control) {
		this.actualizarPaginaTablaDatos(cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cheque_control) {
		this.actualizarPaginaImprimir(cheque_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cheque_control) {
		this.actualizarPaginaImprimir(cheque_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cheque_control) {
		//FORMULARIO
		if(cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_control);
			this.actualizarPaginaFormularioAdd(cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);		
		//COMBOS FK
		if(cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cheque_control) {
		//FORMULARIO
		if(cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);	
		//COMBOS FK
		if(cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cheque_control) {
		//FORMULARIO
		if(cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cheque_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_control);	
		//COMBOS FK
		if(cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cheque_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cheque_control) {
		if(cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cheque_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cheque_control) {
		if(cheque_funcion1.esPaginaForm()==true) {
			window.opener.cheque_webcontrol1.actualizarPaginaTablaDatos(cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(cheque_control) {
		cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cheque_control.strAuxiliarUrlPagina);
				
		cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cheque_control.strAuxiliarTipo,cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cheque_control) {
		cheque_funcion1.resaltarRestaurarDivMensaje(true,cheque_control.strAuxiliarMensajeAlert,cheque_control.strAuxiliarCssMensaje);
			
		if(cheque_funcion1.esPaginaForm()==true) {
			window.opener.cheque_funcion1.resaltarRestaurarDivMensaje(true,cheque_control.strAuxiliarMensajeAlert,cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cheque_control) {
		eval(cheque_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cheque_control, mostrar) {
		
		if(mostrar==true) {
			cheque_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cheque_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cheque_funcion1.mostrarDivMensaje(true,cheque_control.strAuxiliarMensaje,cheque_control.strAuxiliarCssMensaje);
		
		} else {
			cheque_funcion1.mostrarDivMensaje(false,cheque_control.strAuxiliarMensaje,cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cheque_control) {
	
		funcionGeneral.printWebPartPage("cheque",cheque_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarchequesAjaxWebPart").html(cheque_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cheque",jQuery("#divTablaDatosReporteAuxiliarchequesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cheque_control) {
		this.cheque_controlInicial=cheque_control;
			
		if(cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cheque_control.strStyleDivArbol,cheque_control.strStyleDivContent
																,cheque_control.strStyleDivOpcionesBanner,cheque_control.strStyleDivExpandirColapsar
																,cheque_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cheque_control) {
		jQuery("#divTablaDatoschequesAjaxWebPart").html(cheque_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscheques=jQuery("#tblTablaDatoscheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cheque_webcontrol1.registrarControlesTableEdition(cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cheque_control.chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cheque_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cheque_control) {
		this.actualizarCssBotonesPagina(cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cheque_control.tiposReportes,cheque_control.tiposReporte
															 	,cheque_control.tiposPaginacion,cheque_control.tiposAcciones
																,cheque_control.tiposColumnasSelect,cheque_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cheque_control);			
	}
	
	actualizarPaginaAreaBusquedas(cheque_control) {
		jQuery("#divBusquedachequeAjaxWebPart").css("display",cheque_control.strPermisoBusqueda);
		jQuery("#trchequeCabeceraBusquedas").css("display",cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedacheque").css("display",cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cheque_control.htmlTablaOrderBy!=null
			&& cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBychequeAjaxWebPart").html(cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cheque_control.htmlTablaOrderByRel!=null
			&& cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelchequeAjaxWebPart").html(cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedachequeAjaxWebPart").css("display","none");
			jQuery("#trchequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacheque").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cheque_control) {
		jQuery("#tdchequeNuevo").css("display",cheque_control.strPermisoNuevo);
		jQuery("#trchequeElementos").css("display",cheque_control.strVisibleTablaElementos);
		jQuery("#trchequeAcciones").css("display",cheque_control.strVisibleTablaAcciones);
		jQuery("#trchequeParametrosAcciones").css("display",cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(cheque_control);
				
		if(cheque_control.chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(cheque_control);
	}
	
	actualizarPaginaUsuarioInvitado(cheque_control) {
	
		var indexPosition=cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cheque_control) {
		jQuery("#divResumenchequeActualAjaxWebPart").html(cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cheque_control) {
		jQuery("#divAccionesRelacioneschequeAjaxWebPart").html(cheque_control.htmlTablaAccionesRelaciones);
			
		cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cheque_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cheque_control) {
		
		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional").attr("style",cheque_control.strVisibleFK_Idbeneficiario_ocacional);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional").attr("style",cheque_control.strVisibleFK_Idbeneficiario_ocacional);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",cheque_control.strVisibleFK_Idcategoria_cheque);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",cheque_control.strVisibleFK_Idcategoria_cheque);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cheque_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cheque_control.strVisibleFK_Idcliente);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cheque_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cheque_control.strVisibleFK_Idcuenta_corriente);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cheque_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cheque_control.strVisibleFK_Idejercicio);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cheque_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cheque_control.strVisibleFK_Idempresa);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",cheque_control.strVisibleFK_Idestado_deposito_retiro);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",cheque_control.strVisibleFK_Idestado_deposito_retiro);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cheque_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cheque_control.strVisibleFK_Idperiodo);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cheque_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cheque_control.strVisibleFK_Idproveedor);
		}

		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cheque_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cheque_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cheque_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cheque",id,"cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","empresa","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","ejercicio","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","periodo","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","usuario","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParacategoria_cheque(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","categoria_cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","cuenta_corriente","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","cliente","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","proveedor","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParabeneficiario_ocacional_cheque(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","beneficiario_ocacional_cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}

	abrirBusquedaParaestado_deposito_retiro(strNombreCampoBusqueda){//idActual
		cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque","estado_deposito_retiro","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cheque_control) {
	
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id").val(cheque_control.chequeActual.id);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-version_row").val(cheque_control.chequeActual.versionRow);
		
		if(cheque_control.chequeActual.id_empresa!=null && cheque_control.chequeActual.id_empresa>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val() != cheque_control.chequeActual.id_empresa) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val(cheque_control.chequeActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_ejercicio!=null && cheque_control.chequeActual.id_ejercicio>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val() != cheque_control.chequeActual.id_ejercicio) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val(cheque_control.chequeActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_periodo!=null && cheque_control.chequeActual.id_periodo>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val() != cheque_control.chequeActual.id_periodo) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val(cheque_control.chequeActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_usuario!=null && cheque_control.chequeActual.id_usuario>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val() != cheque_control.chequeActual.id_usuario) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val(cheque_control.chequeActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_categoria_cheque!=null && cheque_control.chequeActual.id_categoria_cheque>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != cheque_control.chequeActual.id_categoria_cheque) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(cheque_control.chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_cuenta_corriente!=null && cheque_control.chequeActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cheque_control.chequeActual.id_cuenta_corriente) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cheque_control.chequeActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_cliente!=null && cheque_control.chequeActual.id_cliente>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val() != cheque_control.chequeActual.id_cliente) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val(cheque_control.chequeActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_proveedor!=null && cheque_control.chequeActual.id_proveedor>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val() != cheque_control.chequeActual.id_proveedor) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val(cheque_control.chequeActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_beneficiario_ocacional_cheque!=null && cheque_control.chequeActual.id_beneficiario_ocacional_cheque>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val() != cheque_control.chequeActual.id_beneficiario_ocacional_cheque) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(cheque_control.chequeActual.id_beneficiario_ocacional_cheque).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_estado_deposito_retiro!=null && cheque_control.chequeActual.id_estado_deposito_retiro>-1){
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != cheque_control.chequeActual.id_estado_deposito_retiro) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(cheque_control.chequeActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").select2("val", null);
			if(jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-numero_cheque").val(cheque_control.chequeActual.numero_cheque);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-fecha_emision").val(cheque_control.chequeActual.fecha_emision);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-monto").val(cheque_control.chequeActual.monto);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-monto_texto").val(cheque_control.chequeActual.monto_texto);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-saldo").val(cheque_control.chequeActual.saldo);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-descripcion").val(cheque_control.chequeActual.descripcion);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-cobrado").prop('checked',cheque_control.chequeActual.cobrado);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-impreso").prop('checked',cheque_control.chequeActual.impreso);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-debito").val(cheque_control.chequeActual.debito);
		jQuery("#form"+cheque_constante1.STR_SUFIJO+"-credito").val(cheque_control.chequeActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cheque","cuentascorrientes","","form_cheque",formulario,"","",paraEventoTabla,idFilaTabla,cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}
	
	cargarCombosFK(cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosempresasFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosejerciciosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosperiodosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosusuariosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarComboscategoria_chequesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarComboscuenta_corrientesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosclientesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosproveedorsFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cheque_control.strRecargarFkTiposNinguno!=null && cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosempresasFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosejerciciosFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosperiodosFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosusuariosFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarComboscategoria_chequesFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarComboscuenta_corrientesFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosclientesFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosproveedorsFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_control);
				}

				if(cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_control.strRecargarFkTiposNinguno,",")) { 
					cheque_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cheque_control) {
		jQuery("#spanstrMensajeid").text(cheque_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cheque_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cheque_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(cheque_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cheque_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cheque_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_categoria_cheque").text(cheque_control.strMensajeid_categoria_cheque);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(cheque_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajeid_cliente").text(cheque_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeid_proveedor").text(cheque_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeid_beneficiario_ocacional_cheque").text(cheque_control.strMensajeid_beneficiario_ocacional_cheque);		
		jQuery("#spanstrMensajeid_estado_deposito_retiro").text(cheque_control.strMensajeid_estado_deposito_retiro);		
		jQuery("#spanstrMensajenumero_cheque").text(cheque_control.strMensajenumero_cheque);		
		jQuery("#spanstrMensajefecha_emision").text(cheque_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajemonto").text(cheque_control.strMensajemonto);		
		jQuery("#spanstrMensajemonto_texto").text(cheque_control.strMensajemonto_texto);		
		jQuery("#spanstrMensajesaldo").text(cheque_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(cheque_control.strMensajedescripcion);		
		jQuery("#spanstrMensajecobrado").text(cheque_control.strMensajecobrado);		
		jQuery("#spanstrMensajeimpreso").text(cheque_control.strMensajeimpreso);		
		jQuery("#spanstrMensajedebito").text(cheque_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(cheque_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(cheque_control) {
		jQuery("#tdbtnNuevocheque").css("visibility",cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocheque").css("display",cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcheque").css("visibility",cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcheque").css("display",cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcheque").css("visibility",cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcheque").css("display",cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcheque").css("visibility",cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscheque").css("visibility",cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscheque").css("display",cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcheque").css("visibility",cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcheque").css("visibility",cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcheque").css("visibility",cheque_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaempresaFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.usuariosFK);
	}

	cargarComboEditarTablacategoria_chequeFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.categoria_chequesFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaclienteFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.proveedorsFK);
	}

	cargarComboEditarTablabeneficiario_ocacional_chequeFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.beneficiario_ocacional_chequesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_funcion1,cheque_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cheque_control) {
		var i=0;
		
		i=cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cheque_control.chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(cheque_control.chequeActual.versionRow);
		
		if(cheque_control.chequeActual.id_empresa!=null && cheque_control.chequeActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cheque_control.chequeActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cheque_control.chequeActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_ejercicio!=null && cheque_control.chequeActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cheque_control.chequeActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(cheque_control.chequeActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_periodo!=null && cheque_control.chequeActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cheque_control.chequeActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(cheque_control.chequeActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_usuario!=null && cheque_control.chequeActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cheque_control.chequeActual.id_usuario) {
				jQuery("#t-cel_"+i+"_5").val(cheque_control.chequeActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_categoria_cheque!=null && cheque_control.chequeActual.id_categoria_cheque>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cheque_control.chequeActual.id_categoria_cheque) {
				jQuery("#t-cel_"+i+"_6").val(cheque_control.chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_cuenta_corriente!=null && cheque_control.chequeActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cheque_control.chequeActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_7").val(cheque_control.chequeActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_cliente!=null && cheque_control.chequeActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != cheque_control.chequeActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(cheque_control.chequeActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_proveedor!=null && cheque_control.chequeActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != cheque_control.chequeActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_9").val(cheque_control.chequeActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_beneficiario_ocacional_cheque!=null && cheque_control.chequeActual.id_beneficiario_ocacional_cheque>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != cheque_control.chequeActual.id_beneficiario_ocacional_cheque) {
				jQuery("#t-cel_"+i+"_10").val(cheque_control.chequeActual.id_beneficiario_ocacional_cheque).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_control.chequeActual.id_estado_deposito_retiro!=null && cheque_control.chequeActual.id_estado_deposito_retiro>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != cheque_control.chequeActual.id_estado_deposito_retiro) {
				jQuery("#t-cel_"+i+"_11").val(cheque_control.chequeActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").val(cheque_control.chequeActual.numero_cheque);
		jQuery("#t-cel_"+i+"_13").val(cheque_control.chequeActual.fecha_emision);
		jQuery("#t-cel_"+i+"_14").val(cheque_control.chequeActual.monto);
		jQuery("#t-cel_"+i+"_15").val(cheque_control.chequeActual.monto_texto);
		jQuery("#t-cel_"+i+"_16").val(cheque_control.chequeActual.saldo);
		jQuery("#t-cel_"+i+"_17").val(cheque_control.chequeActual.descripcion);
		jQuery("#t-cel_"+i+"_18").prop('checked',cheque_control.chequeActual.cobrado);
		jQuery("#t-cel_"+i+"_19").prop('checked',cheque_control.chequeActual.impreso);
		jQuery("#t-cel_"+i+"_20").val(cheque_control.chequeActual.debito);
		jQuery("#t-cel_"+i+"_21").val(cheque_control.chequeActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cheque_control) {
		cheque_funcion1.registrarControlesTableValidacionEdition(cheque_control,cheque_webcontrol1,cheque_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,chequeConstante,strParametros);
		
		//cheque_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa",cheque_control.empresasFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_2",cheque_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio",cheque_control.ejerciciosFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_3",cheque_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo",cheque_control.periodosFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_4",cheque_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario",cheque_control.usuariosFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_5",cheque_control.usuariosFK);
		}
	};

	cargarComboscategoria_chequesFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque",cheque_control.categoria_chequesFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_6",cheque_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",cheque_control.categoria_chequesFK);

	};

	cargarComboscuenta_corrientesFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente",cheque_control.cuenta_corrientesFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_7",cheque_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",cheque_control.cuenta_corrientesFK);

	};

	cargarCombosclientesFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente",cheque_control.clientesFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_8",cheque_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",cheque_control.clientesFK);

	};

	cargarCombosproveedorsFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor",cheque_control.proveedorsFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_9",cheque_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cheque_control.proveedorsFK);

	};

	cargarCombosbeneficiario_ocacional_chequesFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque",cheque_control.beneficiario_ocacional_chequesFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_10",cheque_control.beneficiario_ocacional_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque",cheque_control.beneficiario_ocacional_chequesFK);

	};

	cargarCombosestado_deposito_retirosFK(cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",cheque_control.estado_deposito_retirosFK);

		if(cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_control.idFilaTablaActual+"_11",cheque_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",cheque_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cheque_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cheque_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cheque_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cheque_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(cheque_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(cheque_control) {

	};

	registrarComboActionChangeCombosclientesFK(cheque_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cheque_control) {

	};

	registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idempresaDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val() != cheque_control.idempresaDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa").val(cheque_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idejercicioDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val() != cheque_control.idejercicioDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio").val(cheque_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idperiodoDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val() != cheque_control.idperiodoDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo").val(cheque_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idusuarioDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val() != cheque_control.idusuarioDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario").val(cheque_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != cheque_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(cheque_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(cheque_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cheque_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cheque_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(cheque_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idclienteDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val() != cheque_control.idclienteDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente").val(cheque_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(cheque_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idproveedorDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val() != cheque_control.idproveedorDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor").val(cheque_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cheque_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idbeneficiario_ocacional_chequeDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val() != cheque_control.idbeneficiario_ocacional_chequeDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(cheque_control.idbeneficiario_ocacional_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(cheque_control.idbeneficiario_ocacional_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != cheque_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(cheque_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(cheque_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosempresasFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosejerciciosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosperiodosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosusuariosFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorComboscategoria_chequesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorComboscuenta_corrientesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosclientesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosproveedorsFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_control);
			}

			if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_control.strRecargarFkTipos,",")) { 
				cheque_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(cheque_control);
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
	onLoadCombosEventosFK(cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosempresasFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosperiodosFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosusuariosFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosclientesFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_control);
			//}

			//if(cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cheque");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cheque");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);			
			
			if(cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,"cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("beneficiario_ocacional_cheque","id_beneficiario_ocacional_cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParabeneficiario_ocacional_cheque("id_beneficiario_ocacional_cheque");
				//alert(jQuery('#form-id_beneficiario_ocacional_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				cheque_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idbeneficiario_ocacional","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idcategoria_cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idcliente","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idcuenta_corriente","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idejercicio","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idempresa","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idestado_deposito_retiro","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idperiodo","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idproveedor","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque","FK_Idusuario","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cheque_funcion1.validarFormularioJQuery(cheque_constante1);
			
			if(cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cheque_control) {
		
		jQuery("#divBusquedachequeAjaxWebPart").css("display",cheque_control.strPermisoBusqueda);
		jQuery("#trchequeCabeceraBusquedas").css("display",cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedacheque").css("display",cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecheque").css("display",cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscheque").attr("style",cheque_control.strPermisoMostrarTodos);
		
		if(cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdchequeNuevo").css("display",cheque_control.strPermisoNuevo);
			jQuery("#tdchequeNuevoToolBar").css("display",cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdchequeDuplicar").css("display",cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdchequeDuplicarToolBar").css("display",cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdchequeNuevoGuardarCambios").css("display",cheque_control.strPermisoNuevo);
			jQuery("#tdchequeNuevoGuardarCambiosToolBar").css("display",cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdchequeActualizarToolBar").css("display",cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdchequeCopiar").css("display",cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdchequeCopiarToolBar").css("display",cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdchequeConEditar").css("display",cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdchequeEliminarToolBar").css("display",cheque_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdchequeGuardarCambios").css("display",cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdchequeGuardarCambiosToolBar").css("display",cheque_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trchequeElementos").css("display",cheque_control.strVisibleTablaElementos);
		
		jQuery("#trchequeAcciones").css("display",cheque_control.strVisibleTablaAcciones);
		jQuery("#trchequeParametrosAcciones").css("display",cheque_control.strVisibleTablaAcciones);
			
		jQuery("#tdchequeCerrarPagina").css("display",cheque_control.strPermisoPopup);		
		jQuery("#tdchequeCerrarPaginaToolBar").css("display",cheque_control.strPermisoPopup);
		//jQuery("#trchequeAccionesRelaciones").css("display",cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cheque_webcontrol1.registrarEventosControles();
		
		if(cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cheque_constante1.STR_ES_RELACIONADO=="false") {
			cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cheque_constante1.STR_ES_RELACIONES=="true") {
			if(cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cheque_webcontrol1.onLoad();
				
			} else {
				if(cheque_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
						//cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cheque_constante1.BIG_ID_ACTUAL,"cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);
						//cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cheque_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cheque","cuentascorrientes","",cheque_funcion1,cheque_webcontrol1,cheque_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cheque_webcontrol1=new cheque_webcontrol();

if(cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cheque_webcontrol1.onLoadWindow; 
}

//</script>