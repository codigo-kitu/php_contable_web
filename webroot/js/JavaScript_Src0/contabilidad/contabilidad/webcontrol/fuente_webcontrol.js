//<script type="text/javascript" language="javascript">



//var fuenteJQueryPaginaWebInteraccion= function (fuente_control) {
//this.,this.,this.

class fuente_webcontrol extends fuente_webcontrol_add {
	
	fuente_control=null;
	fuente_controlInicial=null;
	fuente_controlAuxiliar=null;
		
	//if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(fuente_control) {
		super();
		
		this.fuente_control=fuente_control;
	}
		
	actualizarVariablesPagina(fuente_control) {
		
		if(fuente_control.action=="index" || fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(fuente_control);
			
		} else if(fuente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(fuente_control);
		
		} else if(fuente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(fuente_control);
		
		} else if(fuente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(fuente_control);
		
		} else if(fuente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(fuente_control);
			
		} else if(fuente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(fuente_control);
			
		} else if(fuente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(fuente_control);
		
		} else if(fuente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(fuente_control);
		
		} else if(fuente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(fuente_control);
		
		} else if(fuente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(fuente_control);
		
		} else if(fuente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(fuente_control);
		
		} else if(fuente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(fuente_control);
		
		} else if(fuente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(fuente_control);
		
		} else if(fuente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(fuente_control);
		
		} else if(fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(fuente_control);
		
		} else if(fuente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(fuente_control);
		
		} else if(fuente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(fuente_control);
		
		} else if(fuente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(fuente_control);
		
		} else if(fuente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(fuente_control);
		
		} else if(fuente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(fuente_control);
		
		} else if(fuente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(fuente_control);
		
		} else if(fuente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(fuente_control);
		
		} else if(fuente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(fuente_control);
		
		} else if(fuente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(fuente_control);		
		
		} else if(fuente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(fuente_control);		
		
		} else if(fuente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(fuente_control);		
		
		} else if(fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control);		
		}
		else if(fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(fuente_control);		
		}
		else if(fuente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(fuente_control.action + " Revisar Manejo");
			
			if(fuente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(fuente_control);
				
				return;
			}
			
			//if(fuente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(fuente_control);
			//}
			
			if(fuente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && fuente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(fuente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(fuente_control, false);			
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(fuente_control);	
			}
			
			if(fuente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(fuente_control);	
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(fuente_control);
			}
			
			
			if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(fuente_control);			
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(fuente_control);
			}
			
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
			}
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(fuente_control);
			}				
			
			if(fuente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control);
			}
			
			if(fuente_control.usuarioActual!=null && fuente_control.usuarioActual.field_strUserName!=null &&
			fuente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(fuente_control);			
			}
		}
		
		
		if(fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(fuente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(fuente_control) {
		
		this.actualizarPaginaCargaGeneral(fuente_control);
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
		this.actualizarPaginaAreaBusquedas(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(fuente_control) {
		
		this.actualizarPaginaCargaGeneral(fuente_control);
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
		this.actualizarPaginaAreaBusquedas(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(fuente_control) {
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(fuente_control) {
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(fuente_control) {
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(fuente_control) {
		this.actualizarPaginaAbrirLink(fuente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);				
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(fuente_control) {
		this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(fuente_control) {
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(fuente_control) {
		this.actualizarPaginaAbrirLink(fuente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(fuente_control) {
		this.actualizarPaginaImprimir(fuente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(fuente_control) {
		this.actualizarPaginaImprimir(fuente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(fuente_control) {
		//FORMULARIO
		if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(fuente_control);
			this.actualizarPaginaFormularioAdd(fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//COMBOS FK
		if(fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(fuente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(fuente_control) {
		//FORMULARIO
		if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);	
		//COMBOS FK
		if(fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(fuente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(fuente_control) {
		if(fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(fuente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(fuente_control) {
		if(fuente_funcion1.esPaginaForm()==true) {
			window.opener.fuente_webcontrol1.actualizarPaginaTablaDatos(fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(fuente_control) {
		fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(fuente_control.strAuxiliarUrlPagina);
				
		fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(fuente_control.strAuxiliarTipo,fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(fuente_control) {
		fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
			
		if(fuente_funcion1.esPaginaForm()==true) {
			window.opener.fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(fuente_control) {
		eval(fuente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(fuente_control, mostrar) {
		
		if(mostrar==true) {
			fuente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				fuente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			fuente_funcion1.mostrarDivMensaje(true,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		
		} else {
			fuente_funcion1.mostrarDivMensaje(false,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(fuente_control) {
	
		funcionGeneral.printWebPartPage("fuente",fuente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarfuentesAjaxWebPart").html(fuente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("fuente",jQuery("#divTablaDatosReporteAuxiliarfuentesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(fuente_control) {
		this.fuente_controlInicial=fuente_control;
			
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(fuente_control.strStyleDivArbol,fuente_control.strStyleDivContent
																,fuente_control.strStyleDivOpcionesBanner,fuente_control.strStyleDivExpandirColapsar
																,fuente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=fuente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",fuente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(fuente_control) {
		jQuery("#divTablaDatosfuentesAjaxWebPart").html(fuente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfuentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(fuente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfuentes=jQuery("#tblTablaDatosfuentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("fuente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',fuente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			fuente_webcontrol1.registrarControlesTableEdition(fuente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		fuente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(fuente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(fuente_control.fuenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(fuente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(fuente_control) {
		this.actualizarCssBotonesPagina(fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(fuente_control.tiposReportes,fuente_control.tiposReporte
															 	,fuente_control.tiposPaginacion,fuente_control.tiposAcciones
																,fuente_control.tiposColumnasSelect,fuente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(fuente_control.tiposRelaciones,fuente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(fuente_control);			
	}
	
	actualizarPaginaAreaBusquedas(fuente_control) {
		jQuery("#divBusquedafuenteAjaxWebPart").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trfuenteCabeceraBusquedas").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedafuente").css("display",fuente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(fuente_control.htmlTablaOrderBy!=null
			&& fuente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfuenteAjaxWebPart").html(fuente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//fuente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(fuente_control.htmlTablaOrderByRel!=null
			&& fuente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfuenteAjaxWebPart").html(fuente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(fuente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafuenteAjaxWebPart").css("display","none");
			jQuery("#trfuenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafuente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(fuente_control) {
		jQuery("#tdfuenteNuevo").css("display",fuente_control.strPermisoNuevo);
		jQuery("#trfuenteElementos").css("display",fuente_control.strVisibleTablaElementos);
		jQuery("#trfuenteAcciones").css("display",fuente_control.strVisibleTablaAcciones);
		jQuery("#trfuenteParametrosAcciones").css("display",fuente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(fuente_control) {
	
		this.actualizarCssBotonesMantenimiento(fuente_control);
				
		if(fuente_control.fuenteActual!=null) {//form
			
			this.actualizarCamposFormulario(fuente_control);			
		}
						
		this.actualizarSpanMensajesCampos(fuente_control);
	}
	
	actualizarPaginaUsuarioInvitado(fuente_control) {
	
		var indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(fuente_control) {
		jQuery("#divResumenfuenteActualAjaxWebPart").html(fuente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control) {
		jQuery("#divAccionesRelacionesfuenteAjaxWebPart").html(fuente_control.htmlTablaAccionesRelaciones);
			
		fuente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(fuente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(fuente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(fuente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfuente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("fuente",id,"contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(fuente_control) {
	
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-id").val(fuente_control.fuenteActual.id);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-version_row").val(fuente_control.fuenteActual.versionRow);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-codigo").val(fuente_control.fuenteActual.codigo);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-nombre").val(fuente_control.fuenteActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+fuente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("fuente","contabilidad","","form_fuente",formulario,"","",paraEventoTabla,idFilaTabla,fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	cargarCombosFK(fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(fuente_control.strRecargarFkTiposNinguno!=null && fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && fuente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(fuente_control) {
		jQuery("#spanstrMensajeid").text(fuente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(fuente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(fuente_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(fuente_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(fuente_control) {
		jQuery("#tdbtnNuevofuente").css("visibility",fuente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofuente").css("display",fuente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfuente").css("visibility",fuente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfuente").css("display",fuente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfuente").css("visibility",fuente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfuente").css("display",fuente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfuente").css("visibility",fuente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfuente").css("visibility",fuente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfuente").css("display",fuente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
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

	actualizarCamposFilaTabla(fuente_control) {
		var i=0;
		
		i=fuente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(fuente_control.fuenteActual.id);
		jQuery("#t-version_row_"+i+"").val(fuente_control.fuenteActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(fuente_control.fuenteActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(fuente_control.fuenteActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(fuente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento_automatico","contabilidad","",fuente_funcion1,fuente_webcontrol1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento","contabilidad","",fuente_funcion1,fuente_webcontrol1,"s","");
	}

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento_predefinido","contabilidad","",fuente_funcion1,fuente_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(fuente_control) {
		fuente_funcion1.registrarControlesTableValidacionEdition(fuente_control,fuente_webcontrol1,fuente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuenteConstante,strParametros);
		
		//fuente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("fuente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("fuente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(fuente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
			if(fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,"fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("fuente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			fuente_funcion1.validarFormularioJQuery(fuente_constante1);
			
			if(fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(fuente_control) {
		
		jQuery("#divBusquedafuenteAjaxWebPart").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trfuenteCabeceraBusquedas").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedafuente").css("display",fuente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefuente").css("display",fuente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfuente").attr("style",fuente_control.strPermisoMostrarTodos);
		
		if(fuente_control.strPermisoNuevo!=null) {
			jQuery("#tdfuenteNuevo").css("display",fuente_control.strPermisoNuevo);
			jQuery("#tdfuenteNuevoToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfuenteDuplicar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfuenteDuplicarToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfuenteNuevoGuardarCambios").css("display",fuente_control.strPermisoNuevo);
			jQuery("#tdfuenteNuevoGuardarCambiosToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdfuenteActualizarToolBar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfuenteCopiar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfuenteCopiarToolBar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfuenteConEditar").css("display",fuente_control.strPermisoActualizar);
		}
		
		jQuery("#tdfuenteEliminarToolBar").css("display",fuente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdfuenteGuardarCambios").css("display",fuente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfuenteGuardarCambiosToolBar").css("display",fuente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trfuenteElementos").css("display",fuente_control.strVisibleTablaElementos);
		
		jQuery("#trfuenteAcciones").css("display",fuente_control.strVisibleTablaAcciones);
		jQuery("#trfuenteParametrosAcciones").css("display",fuente_control.strVisibleTablaAcciones);
			
		jQuery("#tdfuenteCerrarPagina").css("display",fuente_control.strPermisoPopup);		
		jQuery("#tdfuenteCerrarPaginaToolBar").css("display",fuente_control.strPermisoPopup);
		//jQuery("#trfuenteAccionesRelaciones").css("display",fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarEventosControles();
		
		if(fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(fuente_constante1.STR_ES_RELACIONES=="true") {
			if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				fuente_webcontrol1.onLoad();
				
			} else {
				if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(fuente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
						//fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(fuente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(fuente_constante1.BIG_ID_ACTUAL,"fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
						//fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			fuente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var fuente_webcontrol1=new fuente_webcontrol();

if(fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = fuente_webcontrol1.onLoadWindow; 
}

//</script>