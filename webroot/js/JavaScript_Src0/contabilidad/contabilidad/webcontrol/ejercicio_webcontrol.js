//<script type="text/javascript" language="javascript">



//var ejercicioJQueryPaginaWebInteraccion= function (ejercicio_control) {
//this.,this.,this.

class ejercicio_webcontrol extends ejercicio_webcontrol_add {
	
	ejercicio_control=null;
	ejercicio_controlInicial=null;
	ejercicio_controlAuxiliar=null;
		
	//if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ejercicio_control) {
		super();
		
		this.ejercicio_control=ejercicio_control;
	}
		
	actualizarVariablesPagina(ejercicio_control) {
		
		if(ejercicio_control.action=="index" || ejercicio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ejercicio_control);
			
		} else if(ejercicio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(ejercicio_control);
		
		} else if(ejercicio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(ejercicio_control);
		
		} else if(ejercicio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(ejercicio_control);
		
		} else if(ejercicio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(ejercicio_control);
			
		} else if(ejercicio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(ejercicio_control);
			
		} else if(ejercicio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(ejercicio_control);
		
		} else if(ejercicio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(ejercicio_control);
		
		} else if(ejercicio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(ejercicio_control);
		
		} else if(ejercicio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(ejercicio_control);
		
		} else if(ejercicio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(ejercicio_control);
		
		} else if(ejercicio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(ejercicio_control);
		
		} else if(ejercicio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(ejercicio_control);
		
		} else if(ejercicio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(ejercicio_control);
		
		} else if(ejercicio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ejercicio_control);		
		
		} else if(ejercicio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(ejercicio_control);		
		
		} else if(ejercicio_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(ejercicio_control);		
		
		} else if(ejercicio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(ejercicio_control.action + " Revisar Manejo");
			
			if(ejercicio_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(ejercicio_control);
				
				return;
			}
			
			//if(ejercicio_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(ejercicio_control);
			//}
			
			if(ejercicio_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ejercicio_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(ejercicio_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(ejercicio_control, false);			
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(ejercicio_control);	
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(ejercicio_control);	
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(ejercicio_control);
			}
			
			
			if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(ejercicio_control);			
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(ejercicio_control);
			}
			
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
			}
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(ejercicio_control);
			}				
			
			if(ejercicio_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(ejercicio_control);
			}
			
			if(ejercicio_control.usuarioActual!=null && ejercicio_control.usuarioActual.field_strUserName!=null &&
			ejercicio_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(ejercicio_control);			
			}
		}
		
		
		if(ejercicio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ejercicio_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(ejercicio_control) {
		
		this.actualizarPaginaCargaGeneral(ejercicio_control);
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
		this.actualizarPaginaAreaBusquedas(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(ejercicio_control) {
		
		this.actualizarPaginaCargaGeneral(ejercicio_control);
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
		this.actualizarPaginaAreaBusquedas(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(ejercicio_control) {
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(ejercicio_control) {
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ejercicio_control) {
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ejercicio_control) {
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);				
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(ejercicio_control) {
		this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ejercicio_control) {
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ejercicio_control) {
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(ejercicio_control) {
		this.actualizarPaginaImprimir(ejercicio_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ejercicio_control) {
		this.actualizarPaginaImprimir(ejercicio_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(ejercicio_control) {
		//FORMULARIO
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ejercicio_control);
			this.actualizarPaginaFormularioAdd(ejercicio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//COMBOS FK
		if(ejercicio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ejercicio_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(ejercicio_control) {
		//FORMULARIO
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ejercicio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);	
		//COMBOS FK
		if(ejercicio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ejercicio_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(ejercicio_control) {
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ejercicio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ejercicio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ejercicio_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ejercicio_control) {
		if(ejercicio_funcion1.esPaginaForm()==true) {
			window.opener.ejercicio_webcontrol1.actualizarPaginaTablaDatos(ejercicio_control);
		} else {
			this.actualizarPaginaTablaDatos(ejercicio_control);
		}
	}
	
	actualizarPaginaAbrirLink(ejercicio_control) {
		ejercicio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ejercicio_control.strAuxiliarUrlPagina);
				
		ejercicio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ejercicio_control.strAuxiliarTipo,ejercicio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ejercicio_control) {
		ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
			
		if(ejercicio_funcion1.esPaginaForm()==true) {
			window.opener.ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(ejercicio_control) {
		eval(ejercicio_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(ejercicio_control, mostrar) {
		
		if(mostrar==true) {
			ejercicio_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ejercicio_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			ejercicio_funcion1.mostrarDivMensaje(true,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		
		} else {
			ejercicio_funcion1.mostrarDivMensaje(false,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(ejercicio_control) {
	
		funcionGeneral.printWebPartPage("ejercicio",ejercicio_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarejerciciosAjaxWebPart").html(ejercicio_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("ejercicio",jQuery("#divTablaDatosReporteAuxiliarejerciciosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(ejercicio_control) {
		this.ejercicio_controlInicial=ejercicio_control;
			
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ejercicio_control.strStyleDivArbol,ejercicio_control.strStyleDivContent
																,ejercicio_control.strStyleDivOpcionesBanner,ejercicio_control.strStyleDivExpandirColapsar
																,ejercicio_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=ejercicio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",ejercicio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(ejercicio_control) {
		jQuery("#divTablaDatosejerciciosAjaxWebPart").html(ejercicio_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosejercicios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosejercicios=jQuery("#tblTablaDatosejercicios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("ejercicio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',ejercicio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			ejercicio_webcontrol1.registrarControlesTableEdition(ejercicio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		ejercicio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(ejercicio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(ejercicio_control.ejercicioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(ejercicio_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(ejercicio_control) {
		this.actualizarCssBotonesPagina(ejercicio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ejercicio_control.tiposReportes,ejercicio_control.tiposReporte
															 	,ejercicio_control.tiposPaginacion,ejercicio_control.tiposAcciones
																,ejercicio_control.tiposColumnasSelect,ejercicio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(ejercicio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ejercicio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ejercicio_control);			
	}
	
	actualizarPaginaAreaBusquedas(ejercicio_control) {
		jQuery("#divBusquedaejercicioAjaxWebPart").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trejercicioCabeceraBusquedas").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trBusquedaejercicio").css("display",ejercicio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(ejercicio_control.htmlTablaOrderBy!=null
			&& ejercicio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByejercicioAjaxWebPart").html(ejercicio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//ejercicio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(ejercicio_control.htmlTablaOrderByRel!=null
			&& ejercicio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelejercicioAjaxWebPart").html(ejercicio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(ejercicio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaejercicioAjaxWebPart").css("display","none");
			jQuery("#trejercicioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaejercicio").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(ejercicio_control) {
		jQuery("#tdejercicioNuevo").css("display",ejercicio_control.strPermisoNuevo);
		jQuery("#trejercicioElementos").css("display",ejercicio_control.strVisibleTablaElementos);
		jQuery("#trejercicioAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
		jQuery("#trejercicioParametrosAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(ejercicio_control) {
	
		this.actualizarCssBotonesMantenimiento(ejercicio_control);
				
		if(ejercicio_control.ejercicioActual!=null) {//form
			
			this.actualizarCamposFormulario(ejercicio_control);			
		}
						
		this.actualizarSpanMensajesCampos(ejercicio_control);
	}
	
	actualizarPaginaUsuarioInvitado(ejercicio_control) {
	
		var indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(ejercicio_control) {
		jQuery("#divResumenejercicioActualAjaxWebPart").html(ejercicio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(ejercicio_control) {
		jQuery("#divAccionesRelacionesejercicioAjaxWebPart").html(ejercicio_control.htmlTablaAccionesRelaciones);
			
		ejercicio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(ejercicio_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(ejercicio_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionejercicio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("ejercicio",id,"contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(ejercicio_control) {
	
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-id").val(ejercicio_control.ejercicioActual.id);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-version_row").val(ejercicio_control.ejercicioActual.versionRow);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-fecha_inicio").val(ejercicio_control.ejercicioActual.fecha_inicio);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-fecha_fin").val(ejercicio_control.ejercicioActual.fecha_fin);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-descripcion").val(ejercicio_control.ejercicioActual.descripcion);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-activo").prop('checked',ejercicio_control.ejercicioActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+ejercicio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("ejercicio","contabilidad","","form_ejercicio",formulario,"","",paraEventoTabla,idFilaTabla,ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	cargarCombosFK(ejercicio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ejercicio_control.strRecargarFkTiposNinguno!=null && ejercicio_control.strRecargarFkTiposNinguno!='NINGUNO' && ejercicio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(ejercicio_control) {
		jQuery("#spanstrMensajeid").text(ejercicio_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(ejercicio_control.strMensajeversion_row);		
		jQuery("#spanstrMensajefecha_inicio").text(ejercicio_control.strMensajefecha_inicio);		
		jQuery("#spanstrMensajefecha_fin").text(ejercicio_control.strMensajefecha_fin);		
		jQuery("#spanstrMensajedescripcion").text(ejercicio_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(ejercicio_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(ejercicio_control) {
		jQuery("#tdbtnNuevoejercicio").css("visibility",ejercicio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoejercicio").css("display",ejercicio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarejercicio").css("visibility",ejercicio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarejercicio").css("display",ejercicio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarejercicio").css("visibility",ejercicio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarejercicio").css("display",ejercicio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarejercicio").css("visibility",ejercicio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosejercicio").css("visibility",ejercicio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosejercicio").css("display",ejercicio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(ejercicio_control) {
		var i=0;
		
		i=ejercicio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(ejercicio_control.ejercicioActual.id);
		jQuery("#t-version_row_"+i+"").val(ejercicio_control.ejercicioActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(ejercicio_control.ejercicioActual.fecha_inicio);
		jQuery("#t-cel_"+i+"_3").val(ejercicio_control.ejercicioActual.fecha_fin);
		jQuery("#t-cel_"+i+"_4").val(ejercicio_control.ejercicioActual.descripcion);
		jQuery("#t-cel_"+i+"_5").prop('checked',ejercicio_control.ejercicioActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(ejercicio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(ejercicio_control) {
		ejercicio_funcion1.registrarControlesTableValidacionEdition(ejercicio_control,ejercicio_webcontrol1,ejercicio_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicioConstante,strParametros);
		
		//ejercicio_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ejercicio_control
		
	
	}
	
	onLoadCombosDefectoFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ejercicio");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ejercicio");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(ejercicio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
			
			if(ejercicio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,"ejercicio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			ejercicio_funcion1.validarFormularioJQuery(ejercicio_constante1);
			
			if(ejercicio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ejercicio_control) {
		
		jQuery("#divBusquedaejercicioAjaxWebPart").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trejercicioCabeceraBusquedas").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trBusquedaejercicio").css("display",ejercicio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteejercicio").css("display",ejercicio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosejercicio").attr("style",ejercicio_control.strPermisoMostrarTodos);
		
		if(ejercicio_control.strPermisoNuevo!=null) {
			jQuery("#tdejercicioNuevo").css("display",ejercicio_control.strPermisoNuevo);
			jQuery("#tdejercicioNuevoToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdejercicioDuplicar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdejercicioDuplicarToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdejercicioNuevoGuardarCambios").css("display",ejercicio_control.strPermisoNuevo);
			jQuery("#tdejercicioNuevoGuardarCambiosToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(ejercicio_control.strPermisoActualizar!=null) {
			jQuery("#tdejercicioActualizarToolBar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdejercicioCopiar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdejercicioCopiarToolBar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdejercicioConEditar").css("display",ejercicio_control.strPermisoActualizar);
		}
		
		jQuery("#tdejercicioEliminarToolBar").css("display",ejercicio_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdejercicioGuardarCambios").css("display",ejercicio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdejercicioGuardarCambiosToolBar").css("display",ejercicio_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trejercicioElementos").css("display",ejercicio_control.strVisibleTablaElementos);
		
		jQuery("#trejercicioAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
		jQuery("#trejercicioParametrosAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
			
		jQuery("#tdejercicioCerrarPagina").css("display",ejercicio_control.strPermisoPopup);		
		jQuery("#tdejercicioCerrarPaginaToolBar").css("display",ejercicio_control.strPermisoPopup);
		//jQuery("#trejercicioAccionesRelaciones").css("display",ejercicio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarEventosControles();
		
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			ejercicio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ejercicio_constante1.STR_ES_RELACIONES=="true") {
			if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				ejercicio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ejercicio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(ejercicio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				ejercicio_webcontrol1.onLoad();
				
			} else {
				if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
					if(ejercicio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
						//ejercicio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(ejercicio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(ejercicio_constante1.BIG_ID_ACTUAL,"ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
						//ejercicio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			ejercicio_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var ejercicio_webcontrol1=new ejercicio_webcontrol();

if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ejercicio_webcontrol1.onLoadWindow; 
}

//</script>