//<script type="text/javascript" language="javascript">



//var periodoJQueryPaginaWebInteraccion= function (periodo_control) {
//this.,this.,this.

class periodo_webcontrol extends periodo_webcontrol_add {
	
	periodo_control=null;
	periodo_controlInicial=null;
	periodo_controlAuxiliar=null;
		
	//if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(periodo_control) {
		super();
		
		this.periodo_control=periodo_control;
	}
		
	actualizarVariablesPagina(periodo_control) {
		
		if(periodo_control.action=="index" || periodo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(periodo_control);
			
		} else if(periodo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(periodo_control);
		
		} else if(periodo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(periodo_control);
		
		} else if(periodo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(periodo_control);
		
		} else if(periodo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(periodo_control);
			
		} else if(periodo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(periodo_control);
			
		} else if(periodo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(periodo_control);
		
		} else if(periodo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(periodo_control);
		
		} else if(periodo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(periodo_control);
		
		} else if(periodo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(periodo_control);
		
		} else if(periodo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(periodo_control);
		
		} else if(periodo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(periodo_control);
		
		} else if(periodo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(periodo_control);
		
		} else if(periodo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(periodo_control);
		
		} else if(periodo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(periodo_control);
		
		} else if(periodo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(periodo_control);
		
		} else if(periodo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(periodo_control);
		
		} else if(periodo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(periodo_control);
		
		} else if(periodo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(periodo_control);
		
		} else if(periodo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(periodo_control);
		
		} else if(periodo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(periodo_control);
		
		} else if(periodo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(periodo_control);
		
		} else if(periodo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(periodo_control);
		
		} else if(periodo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(periodo_control);		
		
		} else if(periodo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(periodo_control);		
		
		} else if(periodo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(periodo_control);		
		
		} else if(periodo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(periodo_control.action + " Revisar Manejo");
			
			if(periodo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(periodo_control);
				
				return;
			}
			
			//if(periodo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(periodo_control);
			//}
			
			if(periodo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && periodo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(periodo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(periodo_control, false);			
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(periodo_control);	
			}
			
			if(periodo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(periodo_control);	
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(periodo_control);
			}
			
			
			if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(periodo_control);			
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(periodo_control);
			}
			
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
			}
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(periodo_control);
			}				
			
			if(periodo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(periodo_control);
			}
			
			if(periodo_control.usuarioActual!=null && periodo_control.usuarioActual.field_strUserName!=null &&
			periodo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(periodo_control);			
			}
		}
		
		
		if(periodo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(periodo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(periodo_control) {
		
		this.actualizarPaginaCargaGeneral(periodo_control);
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
		this.actualizarPaginaAreaBusquedas(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(periodo_control) {
		
		this.actualizarPaginaCargaGeneral(periodo_control);
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
		this.actualizarPaginaAreaBusquedas(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(periodo_control) {
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(periodo_control) {
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(periodo_control) {
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(periodo_control) {
		this.actualizarPaginaAbrirLink(periodo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);				
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(periodo_control) {
		this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(periodo_control) {
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(periodo_control) {
		this.actualizarPaginaAbrirLink(periodo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(periodo_control) {
		this.actualizarPaginaImprimir(periodo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(periodo_control) {
		this.actualizarPaginaImprimir(periodo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(periodo_control) {
		//FORMULARIO
		if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(periodo_control);
			this.actualizarPaginaFormularioAdd(periodo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//COMBOS FK
		if(periodo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(periodo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(periodo_control) {
		//FORMULARIO
		if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(periodo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);	
		//COMBOS FK
		if(periodo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(periodo_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(periodo_control) {
		if(periodo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && periodo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(periodo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(periodo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(periodo_control) {
		if(periodo_funcion1.esPaginaForm()==true) {
			window.opener.periodo_webcontrol1.actualizarPaginaTablaDatos(periodo_control);
		} else {
			this.actualizarPaginaTablaDatos(periodo_control);
		}
	}
	
	actualizarPaginaAbrirLink(periodo_control) {
		periodo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(periodo_control.strAuxiliarUrlPagina);
				
		periodo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(periodo_control.strAuxiliarTipo,periodo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(periodo_control) {
		periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
			
		if(periodo_funcion1.esPaginaForm()==true) {
			window.opener.periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(periodo_control) {
		eval(periodo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(periodo_control, mostrar) {
		
		if(mostrar==true) {
			periodo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				periodo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			periodo_funcion1.mostrarDivMensaje(true,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		
		} else {
			periodo_funcion1.mostrarDivMensaje(false,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(periodo_control) {
	
		funcionGeneral.printWebPartPage("periodo",periodo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarperiodosAjaxWebPart").html(periodo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("periodo",jQuery("#divTablaDatosReporteAuxiliarperiodosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(periodo_control) {
		this.periodo_controlInicial=periodo_control;
			
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(periodo_control.strStyleDivArbol,periodo_control.strStyleDivContent
																,periodo_control.strStyleDivOpcionesBanner,periodo_control.strStyleDivExpandirColapsar
																,periodo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=periodo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",periodo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(periodo_control) {
		jQuery("#divTablaDatosperiodosAjaxWebPart").html(periodo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperiodos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(periodo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperiodos=jQuery("#tblTablaDatosperiodos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("periodo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',periodo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			periodo_webcontrol1.registrarControlesTableEdition(periodo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		periodo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(periodo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(periodo_control.periodoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(periodo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(periodo_control) {
		this.actualizarCssBotonesPagina(periodo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(periodo_control.tiposReportes,periodo_control.tiposReporte
															 	,periodo_control.tiposPaginacion,periodo_control.tiposAcciones
																,periodo_control.tiposColumnasSelect,periodo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(periodo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(periodo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(periodo_control);			
	}
	
	actualizarPaginaAreaBusquedas(periodo_control) {
		jQuery("#divBusquedaperiodoAjaxWebPart").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trperiodoCabeceraBusquedas").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperiodo").css("display",periodo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(periodo_control.htmlTablaOrderBy!=null
			&& periodo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperiodoAjaxWebPart").html(periodo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//periodo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(periodo_control.htmlTablaOrderByRel!=null
			&& periodo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperiodoAjaxWebPart").html(periodo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(periodo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperiodoAjaxWebPart").css("display","none");
			jQuery("#trperiodoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperiodo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(periodo_control) {
		jQuery("#tdperiodoNuevo").css("display",periodo_control.strPermisoNuevo);
		jQuery("#trperiodoElementos").css("display",periodo_control.strVisibleTablaElementos);
		jQuery("#trperiodoAcciones").css("display",periodo_control.strVisibleTablaAcciones);
		jQuery("#trperiodoParametrosAcciones").css("display",periodo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(periodo_control) {
	
		this.actualizarCssBotonesMantenimiento(periodo_control);
				
		if(periodo_control.periodoActual!=null) {//form
			
			this.actualizarCamposFormulario(periodo_control);			
		}
						
		this.actualizarSpanMensajesCampos(periodo_control);
	}
	
	actualizarPaginaUsuarioInvitado(periodo_control) {
	
		var indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(periodo_control) {
		jQuery("#divResumenperiodoActualAjaxWebPart").html(periodo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(periodo_control) {
		jQuery("#divAccionesRelacionesperiodoAjaxWebPart").html(periodo_control.htmlTablaAccionesRelaciones);
			
		periodo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(periodo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(periodo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(periodo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperiodo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("periodo",id,"contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(periodo_control) {
	
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-id").val(periodo_control.periodoActual.id);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-version_row").val(periodo_control.periodoActual.versionRow);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-nombre").val(periodo_control.periodoActual.nombre);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-fecha_inicio").val(periodo_control.periodoActual.fecha_inicio);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-fecha_fin").val(periodo_control.periodoActual.fecha_fin);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-descripcion").val(periodo_control.periodoActual.descripcion);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-activo").prop('checked',periodo_control.periodoActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+periodo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("periodo","contabilidad","","form_periodo",formulario,"","",paraEventoTabla,idFilaTabla,periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	cargarCombosFK(periodo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(periodo_control.strRecargarFkTiposNinguno!=null && periodo_control.strRecargarFkTiposNinguno!='NINGUNO' && periodo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(periodo_control) {
		jQuery("#spanstrMensajeid").text(periodo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(periodo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(periodo_control.strMensajenombre);		
		jQuery("#spanstrMensajefecha_inicio").text(periodo_control.strMensajefecha_inicio);		
		jQuery("#spanstrMensajefecha_fin").text(periodo_control.strMensajefecha_fin);		
		jQuery("#spanstrMensajedescripcion").text(periodo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(periodo_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(periodo_control) {
		jQuery("#tdbtnNuevoperiodo").css("visibility",periodo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperiodo").css("display",periodo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperiodo").css("visibility",periodo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperiodo").css("display",periodo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperiodo").css("visibility",periodo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperiodo").css("display",periodo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperiodo").css("visibility",periodo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperiodo").css("visibility",periodo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperiodo").css("display",periodo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(periodo_control) {
		var i=0;
		
		i=periodo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(periodo_control.periodoActual.id);
		jQuery("#t-version_row_"+i+"").val(periodo_control.periodoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(periodo_control.periodoActual.nombre);
		jQuery("#t-cel_"+i+"_3").val(periodo_control.periodoActual.fecha_inicio);
		jQuery("#t-cel_"+i+"_4").val(periodo_control.periodoActual.fecha_fin);
		jQuery("#t-cel_"+i+"_5").val(periodo_control.periodoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").prop('checked',periodo_control.periodoActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(periodo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(periodo_control) {
		periodo_funcion1.registrarControlesTableValidacionEdition(periodo_control,periodo_webcontrol1,periodo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodoConstante,strParametros);
		
		//periodo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//periodo_control
		
	
	}
	
	onLoadCombosDefectoFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("periodo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("periodo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(periodo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
			
			if(periodo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,"periodo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			periodo_funcion1.validarFormularioJQuery(periodo_constante1);
			
			if(periodo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(periodo_control) {
		
		jQuery("#divBusquedaperiodoAjaxWebPart").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trperiodoCabeceraBusquedas").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperiodo").css("display",periodo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperiodo").css("display",periodo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperiodo").attr("style",periodo_control.strPermisoMostrarTodos);
		
		if(periodo_control.strPermisoNuevo!=null) {
			jQuery("#tdperiodoNuevo").css("display",periodo_control.strPermisoNuevo);
			jQuery("#tdperiodoNuevoToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperiodoDuplicar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperiodoDuplicarToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperiodoNuevoGuardarCambios").css("display",periodo_control.strPermisoNuevo);
			jQuery("#tdperiodoNuevoGuardarCambiosToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(periodo_control.strPermisoActualizar!=null) {
			jQuery("#tdperiodoActualizarToolBar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperiodoCopiar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperiodoCopiarToolBar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperiodoConEditar").css("display",periodo_control.strPermisoActualizar);
		}
		
		jQuery("#tdperiodoEliminarToolBar").css("display",periodo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdperiodoGuardarCambios").css("display",periodo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperiodoGuardarCambiosToolBar").css("display",periodo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trperiodoElementos").css("display",periodo_control.strVisibleTablaElementos);
		
		jQuery("#trperiodoAcciones").css("display",periodo_control.strVisibleTablaAcciones);
		jQuery("#trperiodoParametrosAcciones").css("display",periodo_control.strVisibleTablaAcciones);
			
		jQuery("#tdperiodoCerrarPagina").css("display",periodo_control.strPermisoPopup);		
		jQuery("#tdperiodoCerrarPaginaToolBar").css("display",periodo_control.strPermisoPopup);
		//jQuery("#trperiodoAccionesRelaciones").css("display",periodo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarEventosControles();
		
		if(periodo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			periodo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(periodo_constante1.STR_ES_RELACIONES=="true") {
			if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				periodo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(periodo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(periodo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				periodo_webcontrol1.onLoad();
				
			} else {
				if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(periodo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
						//periodo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(periodo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(periodo_constante1.BIG_ID_ACTUAL,"periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
						//periodo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			periodo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var periodo_webcontrol1=new periodo_webcontrol();

if(periodo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = periodo_webcontrol1.onLoadWindow; 
}

//</script>