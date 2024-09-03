//<script type="text/javascript" language="javascript">



//var provinciaJQueryPaginaWebInteraccion= function (provincia_control) {
//this.,this.,this.

class provincia_webcontrol extends provincia_webcontrol_add {
	
	provincia_control=null;
	provincia_controlInicial=null;
	provincia_controlAuxiliar=null;
		
	//if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(provincia_control) {
		super();
		
		this.provincia_control=provincia_control;
	}
		
	actualizarVariablesPagina(provincia_control) {
		
		if(provincia_control.action=="index" || provincia_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(provincia_control);
			
		} else if(provincia_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(provincia_control);
		
		} else if(provincia_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(provincia_control);
		
		} else if(provincia_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(provincia_control);
		
		} else if(provincia_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(provincia_control);
			
		} else if(provincia_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(provincia_control);
			
		} else if(provincia_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(provincia_control);
		
		} else if(provincia_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(provincia_control);
		
		} else if(provincia_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(provincia_control);
		
		} else if(provincia_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(provincia_control);
		
		} else if(provincia_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(provincia_control);
		
		} else if(provincia_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(provincia_control);
		
		} else if(provincia_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(provincia_control);
		
		} else if(provincia_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(provincia_control);
		
		} else if(provincia_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(provincia_control);
		
		} else if(provincia_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(provincia_control);
		
		} else if(provincia_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(provincia_control);
		
		} else if(provincia_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(provincia_control);
		
		} else if(provincia_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(provincia_control);
		
		} else if(provincia_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(provincia_control);
		
		} else if(provincia_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(provincia_control);
		
		} else if(provincia_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(provincia_control);
		
		} else if(provincia_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(provincia_control);
		
		} else if(provincia_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(provincia_control);		
		
		} else if(provincia_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(provincia_control);		
		
		} else if(provincia_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(provincia_control);		
		
		} else if(provincia_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(provincia_control);		
		}
		else if(provincia_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(provincia_control);		
		}
		else if(provincia_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(provincia_control);		
		}
		else if(provincia_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(provincia_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(provincia_control.action + " Revisar Manejo");
			
			if(provincia_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(provincia_control);
				
				return;
			}
			
			//if(provincia_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(provincia_control);
			//}
			
			if(provincia_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && provincia_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(provincia_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(provincia_control, false);			
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(provincia_control);	
			}
			
			if(provincia_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(provincia_control);	
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(provincia_control);
			}
			
			
			if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(provincia_control);			
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(provincia_control);
			}
			
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(provincia_control);
			}
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(provincia_control);
			}				
			
			if(provincia_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(provincia_control);
			}
			
			if(provincia_control.usuarioActual!=null && provincia_control.usuarioActual.field_strUserName!=null &&
			provincia_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(provincia_control);			
			}
		}
		
		
		if(provincia_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(provincia_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(provincia_control) {
		
		this.actualizarPaginaCargaGeneral(provincia_control);
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(provincia_control);
		this.actualizarPaginaAreaBusquedas(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(provincia_control) {
		
		this.actualizarPaginaCargaGeneral(provincia_control);
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(provincia_control);
		this.actualizarPaginaAreaBusquedas(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(provincia_control) {
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(provincia_control) {
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(provincia_control) {
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(provincia_control) {
		this.actualizarPaginaAbrirLink(provincia_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);				
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(provincia_control) {
		this.actualizarPaginaFormulario(provincia_control);
		this.onLoadCombosDefectoFK(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.onLoadCombosDefectoFK(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(provincia_control) {
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.onLoadCombosDefectoFK(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(provincia_control) {
		this.actualizarPaginaAbrirLink(provincia_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(provincia_control) {
		this.actualizarPaginaImprimir(provincia_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(provincia_control) {
		this.actualizarPaginaImprimir(provincia_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(provincia_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);
			this.actualizarPaginaFormularioAdd(provincia_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);	
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(provincia_control) {
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(provincia_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);	
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(provincia_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(provincia_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(provincia_control) {
		if(provincia_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && provincia_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(provincia_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(provincia_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(provincia_control) {
		if(provincia_funcion1.esPaginaForm()==true) {
			window.opener.provincia_webcontrol1.actualizarPaginaTablaDatos(provincia_control);
		} else {
			this.actualizarPaginaTablaDatos(provincia_control);
		}
	}
	
	actualizarPaginaAbrirLink(provincia_control) {
		provincia_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(provincia_control.strAuxiliarUrlPagina);
				
		provincia_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(provincia_control.strAuxiliarTipo,provincia_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(provincia_control) {
		provincia_funcion1.resaltarRestaurarDivMensaje(true,provincia_control.strAuxiliarMensajeAlert,provincia_control.strAuxiliarCssMensaje);
			
		if(provincia_funcion1.esPaginaForm()==true) {
			window.opener.provincia_funcion1.resaltarRestaurarDivMensaje(true,provincia_control.strAuxiliarMensajeAlert,provincia_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(provincia_control) {
		eval(provincia_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(provincia_control, mostrar) {
		
		if(mostrar==true) {
			provincia_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				provincia_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			provincia_funcion1.mostrarDivMensaje(true,provincia_control.strAuxiliarMensaje,provincia_control.strAuxiliarCssMensaje);
		
		} else {
			provincia_funcion1.mostrarDivMensaje(false,provincia_control.strAuxiliarMensaje,provincia_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(provincia_control) {
	
		funcionGeneral.printWebPartPage("provincia",provincia_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarprovinciasAjaxWebPart").html(provincia_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("provincia",jQuery("#divTablaDatosReporteAuxiliarprovinciasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(provincia_control) {
		this.provincia_controlInicial=provincia_control;
			
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(provincia_control.strStyleDivArbol,provincia_control.strStyleDivContent
																,provincia_control.strStyleDivOpcionesBanner,provincia_control.strStyleDivExpandirColapsar
																,provincia_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=provincia_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",provincia_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(provincia_control) {
		jQuery("#divTablaDatosprovinciasAjaxWebPart").html(provincia_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosprovincias=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(provincia_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosprovincias=jQuery("#tblTablaDatosprovincias").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("provincia",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',provincia_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			provincia_webcontrol1.registrarControlesTableEdition(provincia_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		provincia_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(provincia_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(provincia_control.provinciaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(provincia_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(provincia_control) {
		this.actualizarCssBotonesPagina(provincia_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(provincia_control.tiposReportes,provincia_control.tiposReporte
															 	,provincia_control.tiposPaginacion,provincia_control.tiposAcciones
																,provincia_control.tiposColumnasSelect,provincia_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(provincia_control.tiposRelaciones,provincia_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(provincia_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(provincia_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(provincia_control);			
	}
	
	actualizarPaginaAreaBusquedas(provincia_control) {
		jQuery("#divBusquedaprovinciaAjaxWebPart").css("display",provincia_control.strPermisoBusqueda);
		jQuery("#trprovinciaCabeceraBusquedas").css("display",provincia_control.strPermisoBusqueda);
		jQuery("#trBusquedaprovincia").css("display",provincia_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(provincia_control.htmlTablaOrderBy!=null
			&& provincia_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByprovinciaAjaxWebPart").html(provincia_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//provincia_webcontrol1.registrarOrderByActions();
			
		}
			
		if(provincia_control.htmlTablaOrderByRel!=null
			&& provincia_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelprovinciaAjaxWebPart").html(provincia_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(provincia_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaprovinciaAjaxWebPart").css("display","none");
			jQuery("#trprovinciaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaprovincia").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(provincia_control) {
		jQuery("#tdprovinciaNuevo").css("display",provincia_control.strPermisoNuevo);
		jQuery("#trprovinciaElementos").css("display",provincia_control.strVisibleTablaElementos);
		jQuery("#trprovinciaAcciones").css("display",provincia_control.strVisibleTablaAcciones);
		jQuery("#trprovinciaParametrosAcciones").css("display",provincia_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(provincia_control) {
	
		this.actualizarCssBotonesMantenimiento(provincia_control);
				
		if(provincia_control.provinciaActual!=null) {//form
			
			this.actualizarCamposFormulario(provincia_control);			
		}
						
		this.actualizarSpanMensajesCampos(provincia_control);
	}
	
	actualizarPaginaUsuarioInvitado(provincia_control) {
	
		var indexPosition=provincia_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=provincia_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(provincia_control) {
		jQuery("#divResumenprovinciaActualAjaxWebPart").html(provincia_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(provincia_control) {
		jQuery("#divAccionesRelacionesprovinciaAjaxWebPart").html(provincia_control.htmlTablaAccionesRelaciones);
			
		provincia_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(provincia_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(provincia_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(provincia_control) {
		
		if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+provincia_constante1.STR_SUFIJO+"BusquedaPorcodigo").attr("style",provincia_control.strVisibleBusquedaPorcodigo);
			jQuery("#tblstrVisible"+provincia_constante1.STR_SUFIJO+"BusquedaPorcodigo").attr("style",provincia_control.strVisibleBusquedaPorcodigo);
		}

		if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+provincia_constante1.STR_SUFIJO+"BusquedaPornombre").attr("style",provincia_control.strVisibleBusquedaPornombre);
			jQuery("#tblstrVisible"+provincia_constante1.STR_SUFIJO+"BusquedaPornombre").attr("style",provincia_control.strVisibleBusquedaPornombre);
		}

		if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+provincia_constante1.STR_SUFIJO+"FK_Idpais").attr("style",provincia_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+provincia_constante1.STR_SUFIJO+"FK_Idpais").attr("style",provincia_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionprovincia();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("provincia",id,"seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);		
	}
	
	

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		provincia_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("provincia","pais","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(provincia_control) {
	
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id").val(provincia_control.provinciaActual.id);
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-version_row").val(provincia_control.provinciaActual.versionRow);
		
		if(provincia_control.provinciaActual.id_pais!=null && provincia_control.provinciaActual.id_pais>-1){
			if(jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != provincia_control.provinciaActual.id_pais) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(provincia_control.provinciaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-codigo").val(provincia_control.provinciaActual.codigo);
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-nombre").val(provincia_control.provinciaActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+provincia_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("provincia","seguridad","","form_provincia",formulario,"","",paraEventoTabla,idFilaTabla,provincia_funcion1,provincia_webcontrol1,provincia_constante1);
	}
	
	cargarCombosFK(provincia_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 
				provincia_webcontrol1.cargarCombospaissFK(provincia_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(provincia_control.strRecargarFkTiposNinguno!=null && provincia_control.strRecargarFkTiposNinguno!='NINGUNO' && provincia_control.strRecargarFkTiposNinguno!='') {
			
				if(provincia_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTiposNinguno,",")) { 
					provincia_webcontrol1.cargarCombospaissFK(provincia_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(provincia_control) {
		jQuery("#spanstrMensajeid").text(provincia_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(provincia_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_pais").text(provincia_control.strMensajeid_pais);		
		jQuery("#spanstrMensajecodigo").text(provincia_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(provincia_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(provincia_control) {
		jQuery("#tdbtnNuevoprovincia").css("visibility",provincia_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoprovincia").css("display",provincia_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarprovincia").css("visibility",provincia_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarprovincia").css("display",provincia_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarprovincia").css("visibility",provincia_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarprovincia").css("display",provincia_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarprovincia").css("visibility",provincia_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosprovincia").css("visibility",provincia_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosprovincia").css("display",provincia_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionciudad").click(function(){

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaciudades(idActual);
		});
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablapaisFK(provincia_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,provincia_funcion1,provincia_control.paissFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(provincia_control) {
		var i=0;
		
		i=provincia_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(provincia_control.provinciaActual.id);
		jQuery("#t-version_row_"+i+"").val(provincia_control.provinciaActual.versionRow);
		
		if(provincia_control.provinciaActual.id_pais!=null && provincia_control.provinciaActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != provincia_control.provinciaActual.id_pais) {
				jQuery("#t-cel_"+i+"_2").val(provincia_control.provinciaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(provincia_control.provinciaActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(provincia_control.provinciaActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(provincia_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionciudad").click(function(){
		jQuery("#tblTablaDatosprovincias").on("click",".imgrelacionciudad", function () {

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaciudades(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatosprovincias").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosprovincias").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosprovincias").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualprovincia");

			provincia_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaciudades(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"provincia","ciudad","seguridad","",provincia_funcion1,provincia_webcontrol1,"es","");
	}

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"provincia","dato_general_usuario","seguridad","",provincia_funcion1,provincia_webcontrol1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"provincia","cliente","seguridad","",provincia_funcion1,provincia_webcontrol1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"provincia","proveedor","seguridad","",provincia_funcion1,provincia_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(provincia_control) {
		provincia_funcion1.registrarControlesTableValidacionEdition(provincia_control,provincia_webcontrol1,provincia_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provinciaConstante,strParametros);
		
		//provincia_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombospaissFK(provincia_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+provincia_constante1.STR_SUFIJO+"-id_pais",provincia_control.paissFK);

		if(provincia_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+provincia_control.idFilaTablaActual+"_2",provincia_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",provincia_control.paissFK);

	};

	
	
	registrarComboActionChangeCombospaissFK(provincia_control) {

	};

	
	
	setDefectoValorCombospaissFK(provincia_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(provincia_control.idpaisDefaultFK>-1 && jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != provincia_control.idpaisDefaultFK) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(provincia_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(provincia_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//provincia_control
		
	
	}
	
	onLoadCombosDefectoFK(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 
				provincia_webcontrol1.setDefectoValorCombospaissFK(provincia_control);
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
	onLoadCombosEventosFK(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				provincia_webcontrol1.registrarComboActionChangeCombospaissFK(provincia_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("provincia");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("provincia");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(provincia_funcion1,provincia_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(provincia_funcion1,provincia_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(provincia_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);			
			
			if(provincia_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,"provincia");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				provincia_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("provincia","BusquedaPorcodigo","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("provincia","BusquedaPornombre","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("provincia","FK_Idpais","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("provincia");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			provincia_funcion1.validarFormularioJQuery(provincia_constante1);
			
			if(provincia_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(provincia_control) {
		
		jQuery("#divBusquedaprovinciaAjaxWebPart").css("display",provincia_control.strPermisoBusqueda);
		jQuery("#trprovinciaCabeceraBusquedas").css("display",provincia_control.strPermisoBusqueda);
		jQuery("#trBusquedaprovincia").css("display",provincia_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteprovincia").css("display",provincia_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosprovincia").attr("style",provincia_control.strPermisoMostrarTodos);
		
		if(provincia_control.strPermisoNuevo!=null) {
			jQuery("#tdprovinciaNuevo").css("display",provincia_control.strPermisoNuevo);
			jQuery("#tdprovinciaNuevoToolBar").css("display",provincia_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdprovinciaDuplicar").css("display",provincia_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprovinciaDuplicarToolBar").css("display",provincia_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprovinciaNuevoGuardarCambios").css("display",provincia_control.strPermisoNuevo);
			jQuery("#tdprovinciaNuevoGuardarCambiosToolBar").css("display",provincia_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(provincia_control.strPermisoActualizar!=null) {
			jQuery("#tdprovinciaActualizarToolBar").css("display",provincia_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprovinciaCopiar").css("display",provincia_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprovinciaCopiarToolBar").css("display",provincia_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprovinciaConEditar").css("display",provincia_control.strPermisoActualizar);
		}
		
		jQuery("#tdprovinciaEliminarToolBar").css("display",provincia_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdprovinciaGuardarCambios").css("display",provincia_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdprovinciaGuardarCambiosToolBar").css("display",provincia_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trprovinciaElementos").css("display",provincia_control.strVisibleTablaElementos);
		
		jQuery("#trprovinciaAcciones").css("display",provincia_control.strVisibleTablaAcciones);
		jQuery("#trprovinciaParametrosAcciones").css("display",provincia_control.strVisibleTablaAcciones);
			
		jQuery("#tdprovinciaCerrarPagina").css("display",provincia_control.strPermisoPopup);		
		jQuery("#tdprovinciaCerrarPaginaToolBar").css("display",provincia_control.strPermisoPopup);
		//jQuery("#trprovinciaAccionesRelaciones").css("display",provincia_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		provincia_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		provincia_webcontrol1.registrarEventosControles();
		
		if(provincia_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			provincia_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(provincia_constante1.STR_ES_RELACIONES=="true") {
			if(provincia_constante1.BIT_ES_PAGINA_FORM==true) {
				provincia_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(provincia_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(provincia_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				provincia_webcontrol1.onLoad();
				
			} else {
				if(provincia_constante1.BIT_ES_PAGINA_FORM==true) {
					if(provincia_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
						//provincia_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(provincia_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(provincia_constante1.BIG_ID_ACTUAL,"provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
						//provincia_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			provincia_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var provincia_webcontrol1=new provincia_webcontrol();

if(provincia_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = provincia_webcontrol1.onLoadWindow; 
}

//</script>