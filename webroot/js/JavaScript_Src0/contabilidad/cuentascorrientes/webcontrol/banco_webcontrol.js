//<script type="text/javascript" language="javascript">



//var bancoJQueryPaginaWebInteraccion= function (banco_control) {
//this.,this.,this.

class banco_webcontrol extends banco_webcontrol_add {
	
	banco_control=null;
	banco_controlInicial=null;
	banco_controlAuxiliar=null;
		
	//if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(banco_control) {
		super();
		
		this.banco_control=banco_control;
	}
		
	actualizarVariablesPagina(banco_control) {
		
		if(banco_control.action=="index" || banco_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(banco_control);
			
		} else if(banco_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(banco_control);
		
		} else if(banco_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(banco_control);
		
		} else if(banco_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(banco_control);
		
		} else if(banco_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(banco_control);
			
		} else if(banco_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(banco_control);
			
		} else if(banco_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(banco_control);
		
		} else if(banco_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(banco_control);
		
		} else if(banco_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(banco_control);
		
		} else if(banco_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(banco_control);
		
		} else if(banco_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(banco_control);
		
		} else if(banco_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(banco_control);
		
		} else if(banco_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(banco_control);
		
		} else if(banco_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(banco_control);
		
		} else if(banco_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(banco_control);
		
		} else if(banco_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(banco_control);
		
		} else if(banco_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(banco_control);
		
		} else if(banco_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(banco_control);
		
		} else if(banco_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(banco_control);
		
		} else if(banco_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(banco_control);
		
		} else if(banco_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(banco_control);
		
		} else if(banco_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(banco_control);
		
		} else if(banco_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(banco_control);
		
		} else if(banco_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(banco_control);
		
		} else if(banco_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(banco_control);
		
		} else if(banco_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(banco_control);
		
		} else if(banco_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(banco_control);
		
		} else if(banco_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(banco_control);		
		
		} else if(banco_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(banco_control);		
		
		} else if(banco_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(banco_control);		
		
		} else if(banco_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control);		
		}
		else if(banco_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(banco_control);		
		}
		else if(banco_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(banco_control);		
		}
		else if(banco_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(banco_control.action + " Revisar Manejo");
			
			if(banco_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(banco_control);
				
				return;
			}
			
			//if(banco_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(banco_control);
			//}
			
			if(banco_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && banco_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(banco_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(banco_control, false);			
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(banco_control);	
			}
			
			if(banco_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(banco_control);	
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(banco_control);
			}
			
			
			if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(banco_control);			
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(banco_control);
			}
			
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
			}
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(banco_control);
			}				
			
			if(banco_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control);
			}
			
			if(banco_control.usuarioActual!=null && banco_control.usuarioActual.field_strUserName!=null &&
			banco_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(banco_control);			
			}
		}
		
		
		if(banco_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(banco_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(banco_control) {
		
		this.actualizarPaginaCargaGeneral(banco_control);
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
		this.actualizarPaginaAreaBusquedas(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(banco_control) {
		
		this.actualizarPaginaCargaGeneral(banco_control);
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
		this.actualizarPaginaAreaBusquedas(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(banco_control) {
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(banco_control) {
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(banco_control) {
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(banco_control) {
		this.actualizarPaginaAbrirLink(banco_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);				
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(banco_control) {
		this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(banco_control) {
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(banco_control) {
		this.actualizarPaginaAbrirLink(banco_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(banco_control) {
		this.actualizarPaginaImprimir(banco_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(banco_control) {
		this.actualizarPaginaImprimir(banco_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);
			this.actualizarPaginaFormularioAdd(banco_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);	
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(banco_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);	
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(banco_control) {
		if(banco_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && banco_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(banco_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(banco_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(banco_control) {
		if(banco_funcion1.esPaginaForm()==true) {
			window.opener.banco_webcontrol1.actualizarPaginaTablaDatos(banco_control);
		} else {
			this.actualizarPaginaTablaDatos(banco_control);
		}
	}
	
	actualizarPaginaAbrirLink(banco_control) {
		banco_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(banco_control.strAuxiliarUrlPagina);
				
		banco_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(banco_control.strAuxiliarTipo,banco_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(banco_control) {
		banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
			
		if(banco_funcion1.esPaginaForm()==true) {
			window.opener.banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(banco_control) {
		eval(banco_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(banco_control, mostrar) {
		
		if(mostrar==true) {
			banco_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				banco_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			banco_funcion1.mostrarDivMensaje(true,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		
		} else {
			banco_funcion1.mostrarDivMensaje(false,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(banco_control) {
	
		funcionGeneral.printWebPartPage("banco",banco_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarbancosAjaxWebPart").html(banco_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("banco",jQuery("#divTablaDatosReporteAuxiliarbancosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(banco_control) {
		this.banco_controlInicial=banco_control;
			
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(banco_control.strStyleDivArbol,banco_control.strStyleDivContent
																,banco_control.strStyleDivOpcionesBanner,banco_control.strStyleDivExpandirColapsar
																,banco_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=banco_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",banco_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(banco_control) {
		jQuery("#divTablaDatosbancosAjaxWebPart").html(banco_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbancos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(banco_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbancos=jQuery("#tblTablaDatosbancos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("banco",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',banco_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			banco_webcontrol1.registrarControlesTableEdition(banco_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		banco_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(banco_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(banco_control.bancoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(banco_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(banco_control) {
		this.actualizarCssBotonesPagina(banco_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(banco_control.tiposReportes,banco_control.tiposReporte
															 	,banco_control.tiposPaginacion,banco_control.tiposAcciones
																,banco_control.tiposColumnasSelect,banco_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(banco_control.tiposRelaciones,banco_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(banco_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(banco_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(banco_control);			
	}
	
	actualizarPaginaAreaBusquedas(banco_control) {
		jQuery("#divBusquedabancoAjaxWebPart").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trbancoCabeceraBusquedas").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trBusquedabanco").css("display",banco_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(banco_control.htmlTablaOrderBy!=null
			&& banco_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybancoAjaxWebPart").html(banco_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//banco_webcontrol1.registrarOrderByActions();
			
		}
			
		if(banco_control.htmlTablaOrderByRel!=null
			&& banco_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbancoAjaxWebPart").html(banco_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(banco_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabancoAjaxWebPart").css("display","none");
			jQuery("#trbancoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabanco").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(banco_control) {
		jQuery("#tdbancoNuevo").css("display",banco_control.strPermisoNuevo);
		jQuery("#trbancoElementos").css("display",banco_control.strVisibleTablaElementos);
		jQuery("#trbancoAcciones").css("display",banco_control.strVisibleTablaAcciones);
		jQuery("#trbancoParametrosAcciones").css("display",banco_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(banco_control) {
	
		this.actualizarCssBotonesMantenimiento(banco_control);
				
		if(banco_control.bancoActual!=null) {//form
			
			this.actualizarCamposFormulario(banco_control);			
		}
						
		this.actualizarSpanMensajesCampos(banco_control);
	}
	
	actualizarPaginaUsuarioInvitado(banco_control) {
	
		var indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(banco_control) {
		jQuery("#divResumenbancoActualAjaxWebPart").html(banco_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control) {
		jQuery("#divAccionesRelacionesbancoAjaxWebPart").html(banco_control.htmlTablaAccionesRelaciones);
			
		banco_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(banco_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(banco_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(banco_control) {
		
		if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+banco_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",banco_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+banco_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",banco_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbanco();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("banco",id,"cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		banco_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("banco","empresa","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(banco_control) {
	
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-id").val(banco_control.bancoActual.id);
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-version_row").val(banco_control.bancoActual.versionRow);
		
		if(banco_control.bancoActual.id_empresa!=null && banco_control.bancoActual.id_empresa>-1){
			if(jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != banco_control.bancoActual.id_empresa) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(banco_control.bancoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-codigo").val(banco_control.bancoActual.codigo);
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-nombre").val(banco_control.bancoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+banco_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("banco","cuentascorrientes","","form_banco",formulario,"","",paraEventoTabla,idFilaTabla,banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	cargarCombosFK(banco_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.cargarCombosempresasFK(banco_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(banco_control.strRecargarFkTiposNinguno!=null && banco_control.strRecargarFkTiposNinguno!='NINGUNO' && banco_control.strRecargarFkTiposNinguno!='') {
			
				if(banco_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTiposNinguno,",")) { 
					banco_webcontrol1.cargarCombosempresasFK(banco_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(banco_control) {
		jQuery("#spanstrMensajeid").text(banco_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(banco_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(banco_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(banco_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(banco_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(banco_control) {
		jQuery("#tdbtnNuevobanco").css("visibility",banco_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobanco").css("display",banco_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbanco").css("visibility",banco_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbanco").css("display",banco_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbanco").css("visibility",banco_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbanco").css("display",banco_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbanco").css("visibility",banco_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbanco").css("visibility",banco_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbanco").css("display",banco_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbanco").css("visibility",banco_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbanco").css("visibility",banco_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbanco").css("visibility",banco_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualbanco");

			banco_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(banco_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,banco_funcion1,banco_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(banco_control) {
		var i=0;
		
		i=banco_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(banco_control.bancoActual.id);
		jQuery("#t-version_row_"+i+"").val(banco_control.bancoActual.versionRow);
		
		if(banco_control.bancoActual.id_empresa!=null && banco_control.bancoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != banco_control.bancoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(banco_control.bancoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(banco_control.bancoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(banco_control.bancoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(banco_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente").click(function(){
		jQuery("#tblTablaDatosbancos").on("click",".imgrelacioncuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualbanco");

			banco_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"banco","cuenta_corriente","cuentascorrientes","",banco_funcion1,banco_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(banco_control) {
		banco_funcion1.registrarControlesTableValidacionEdition(banco_control,banco_webcontrol1,banco_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,bancoConstante,strParametros);
		
		//banco_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(banco_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+banco_constante1.STR_SUFIJO+"-id_empresa",banco_control.empresasFK);

		if(banco_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+banco_control.idFilaTablaActual+"_2",banco_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(banco_control) {

	};

	
	
	setDefectoValorCombosempresasFK(banco_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(banco_control.idempresaDefaultFK>-1 && jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != banco_control.idempresaDefaultFK) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(banco_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//banco_control
		
	
	}
	
	onLoadCombosDefectoFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.setDefectoValorCombosempresasFK(banco_control);
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
	onLoadCombosEventosFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				banco_webcontrol1.registrarComboActionChangeCombosempresasFK(banco_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("banco");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("banco");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(banco_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
			if(banco_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,"banco");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",banco_funcion1,banco_webcontrol1,banco_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				banco_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("banco","FK_Idempresa","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("banco");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			banco_funcion1.validarFormularioJQuery(banco_constante1);
			
			if(banco_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(banco_control) {
		
		jQuery("#divBusquedabancoAjaxWebPart").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trbancoCabeceraBusquedas").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trBusquedabanco").css("display",banco_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebanco").css("display",banco_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbanco").attr("style",banco_control.strPermisoMostrarTodos);
		
		if(banco_control.strPermisoNuevo!=null) {
			jQuery("#tdbancoNuevo").css("display",banco_control.strPermisoNuevo);
			jQuery("#tdbancoNuevoToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbancoDuplicar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbancoDuplicarToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbancoNuevoGuardarCambios").css("display",banco_control.strPermisoNuevo);
			jQuery("#tdbancoNuevoGuardarCambiosToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(banco_control.strPermisoActualizar!=null) {
			jQuery("#tdbancoActualizarToolBar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbancoCopiar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbancoCopiarToolBar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbancoConEditar").css("display",banco_control.strPermisoActualizar);
		}
		
		jQuery("#tdbancoEliminarToolBar").css("display",banco_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdbancoGuardarCambios").css("display",banco_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbancoGuardarCambiosToolBar").css("display",banco_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trbancoElementos").css("display",banco_control.strVisibleTablaElementos);
		
		jQuery("#trbancoAcciones").css("display",banco_control.strVisibleTablaAcciones);
		jQuery("#trbancoParametrosAcciones").css("display",banco_control.strVisibleTablaAcciones);
			
		jQuery("#tdbancoCerrarPagina").css("display",banco_control.strPermisoPopup);		
		jQuery("#tdbancoCerrarPaginaToolBar").css("display",banco_control.strPermisoPopup);
		//jQuery("#trbancoAccionesRelaciones").css("display",banco_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarEventosControles();
		
		if(banco_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			banco_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(banco_constante1.STR_ES_RELACIONES=="true") {
			if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				banco_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(banco_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(banco_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				banco_webcontrol1.onLoad();
				
			} else {
				if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
					if(banco_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
						//banco_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(banco_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(banco_constante1.BIG_ID_ACTUAL,"banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
						//banco_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			banco_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var banco_webcontrol1=new banco_webcontrol();

if(banco_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = banco_webcontrol1.onLoadWindow; 
}

//</script>