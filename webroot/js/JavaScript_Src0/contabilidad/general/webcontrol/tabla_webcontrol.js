//<script type="text/javascript" language="javascript">



//var tablaJQueryPaginaWebInteraccion= function (tabla_control) {
//this.,this.,this.

class tabla_webcontrol extends tabla_webcontrol_add {
	
	tabla_control=null;
	tabla_controlInicial=null;
	tabla_controlAuxiliar=null;
		
	//if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tabla_control) {
		super();
		
		this.tabla_control=tabla_control;
	}
		
	actualizarVariablesPagina(tabla_control) {
		
		if(tabla_control.action=="index" || tabla_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tabla_control);
			
		} else if(tabla_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tabla_control);
		
		} else if(tabla_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tabla_control);
		
		} else if(tabla_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tabla_control);
		
		} else if(tabla_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tabla_control);
			
		} else if(tabla_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tabla_control);
			
		} else if(tabla_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tabla_control);
		
		} else if(tabla_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tabla_control);
		
		} else if(tabla_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tabla_control);
		
		} else if(tabla_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tabla_control);
		
		} else if(tabla_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tabla_control);
		
		} else if(tabla_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tabla_control);
		
		} else if(tabla_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tabla_control);
		
		} else if(tabla_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tabla_control);
		
		} else if(tabla_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tabla_control);
		
		} else if(tabla_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tabla_control);
		
		} else if(tabla_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tabla_control);
		
		} else if(tabla_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tabla_control);
		
		} else if(tabla_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tabla_control);
		
		} else if(tabla_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tabla_control);
		
		} else if(tabla_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tabla_control);
		
		} else if(tabla_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tabla_control);
		
		} else if(tabla_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tabla_control);
		
		} else if(tabla_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tabla_control);		
		
		} else if(tabla_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tabla_control);		
		
		} else if(tabla_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tabla_control);		
		
		} else if(tabla_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control);		
		}
		else if(tabla_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tabla_control);		
		}
		else if(tabla_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tabla_control.action + " Revisar Manejo");
			
			if(tabla_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tabla_control);
				
				return;
			}
			
			//if(tabla_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tabla_control);
			//}
			
			if(tabla_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tabla_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tabla_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tabla_control, false);			
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tabla_control);	
			}
			
			if(tabla_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tabla_control);	
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tabla_control);
			}
			
			
			if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tabla_control);			
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tabla_control);
			}
			
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
			}
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tabla_control);
			}				
			
			if(tabla_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control);
			}
			
			if(tabla_control.usuarioActual!=null && tabla_control.usuarioActual.field_strUserName!=null &&
			tabla_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tabla_control);			
			}
		}
		
		
		if(tabla_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tabla_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tabla_control) {
		
		this.actualizarPaginaCargaGeneral(tabla_control);
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
		this.actualizarPaginaAreaBusquedas(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tabla_control) {
		
		this.actualizarPaginaCargaGeneral(tabla_control);
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
		this.actualizarPaginaAreaBusquedas(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tabla_control) {
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tabla_control) {
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tabla_control) {
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tabla_control) {
		this.actualizarPaginaAbrirLink(tabla_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);				
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tabla_control) {
		this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tabla_control) {
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tabla_control) {
		this.actualizarPaginaAbrirLink(tabla_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tabla_control) {
		this.actualizarPaginaImprimir(tabla_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tabla_control) {
		this.actualizarPaginaImprimir(tabla_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tabla_control) {
		//FORMULARIO
		if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tabla_control);
			this.actualizarPaginaFormularioAdd(tabla_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//COMBOS FK
		if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tabla_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tabla_control) {
		//FORMULARIO
		if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tabla_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);	
		//COMBOS FK
		if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tabla_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tabla_control) {
		if(tabla_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tabla_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tabla_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tabla_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tabla_control) {
		if(tabla_funcion1.esPaginaForm()==true) {
			window.opener.tabla_webcontrol1.actualizarPaginaTablaDatos(tabla_control);
		} else {
			this.actualizarPaginaTablaDatos(tabla_control);
		}
	}
	
	actualizarPaginaAbrirLink(tabla_control) {
		tabla_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tabla_control.strAuxiliarUrlPagina);
				
		tabla_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tabla_control.strAuxiliarTipo,tabla_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tabla_control) {
		tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
			
		if(tabla_funcion1.esPaginaForm()==true) {
			window.opener.tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tabla_control) {
		eval(tabla_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tabla_control, mostrar) {
		
		if(mostrar==true) {
			tabla_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tabla_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tabla_funcion1.mostrarDivMensaje(true,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		
		} else {
			tabla_funcion1.mostrarDivMensaje(false,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tabla_control) {
	
		funcionGeneral.printWebPartPage("tabla",tabla_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartablasAjaxWebPart").html(tabla_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tabla",jQuery("#divTablaDatosReporteAuxiliartablasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tabla_control) {
		this.tabla_controlInicial=tabla_control;
			
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tabla_control.strStyleDivArbol,tabla_control.strStyleDivContent
																,tabla_control.strStyleDivOpcionesBanner,tabla_control.strStyleDivExpandirColapsar
																,tabla_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tabla_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tabla_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tabla_control) {
		jQuery("#divTablaDatostablasAjaxWebPart").html(tabla_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostablas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tabla_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostablas=jQuery("#tblTablaDatostablas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tabla",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tabla_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tabla_webcontrol1.registrarControlesTableEdition(tabla_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tabla_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tabla_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tabla_control.tablaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tabla_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tabla_control) {
		this.actualizarCssBotonesPagina(tabla_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tabla_control.tiposReportes,tabla_control.tiposReporte
															 	,tabla_control.tiposPaginacion,tabla_control.tiposAcciones
																,tabla_control.tiposColumnasSelect,tabla_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tabla_control.tiposRelaciones,tabla_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tabla_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tabla_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tabla_control);			
	}
	
	actualizarPaginaAreaBusquedas(tabla_control) {
		jQuery("#divBusquedatablaAjaxWebPart").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trtablaCabeceraBusquedas").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trBusquedatabla").css("display",tabla_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tabla_control.htmlTablaOrderBy!=null
			&& tabla_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytablaAjaxWebPart").html(tabla_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tabla_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tabla_control.htmlTablaOrderByRel!=null
			&& tabla_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltablaAjaxWebPart").html(tabla_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tabla_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatablaAjaxWebPart").css("display","none");
			jQuery("#trtablaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatabla").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tabla_control) {
		jQuery("#tdtablaNuevo").css("display",tabla_control.strPermisoNuevo);
		jQuery("#trtablaElementos").css("display",tabla_control.strVisibleTablaElementos);
		jQuery("#trtablaAcciones").css("display",tabla_control.strVisibleTablaAcciones);
		jQuery("#trtablaParametrosAcciones").css("display",tabla_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tabla_control) {
	
		this.actualizarCssBotonesMantenimiento(tabla_control);
				
		if(tabla_control.tablaActual!=null) {//form
			
			this.actualizarCamposFormulario(tabla_control);			
		}
						
		this.actualizarSpanMensajesCampos(tabla_control);
	}
	
	actualizarPaginaUsuarioInvitado(tabla_control) {
	
		var indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tabla_control) {
		jQuery("#divResumentablaActualAjaxWebPart").html(tabla_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control) {
		jQuery("#divAccionesRelacionestablaAjaxWebPart").html(tabla_control.htmlTablaAccionesRelaciones);
			
		tabla_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tabla_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tabla_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tabla_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontabla();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tabla","general","",tabla_funcion1,tabla_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tabla",id,"general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tabla_control) {
	
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id").val(tabla_control.tablaActual.id);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-version_row").val(tabla_control.tablaActual.versionRow);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-codigo").val(tabla_control.tablaActual.codigo);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-nombre").val(tabla_control.tablaActual.nombre);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-descripcion").val(tabla_control.tablaActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tabla_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tabla","general","","form_tabla",formulario,"","",paraEventoTabla,idFilaTabla,tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	cargarCombosFK(tabla_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tabla_control.strRecargarFkTiposNinguno!=null && tabla_control.strRecargarFkTiposNinguno!='NINGUNO' && tabla_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(tabla_control) {
		jQuery("#spanstrMensajeid").text(tabla_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tabla_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tabla_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tabla_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(tabla_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(tabla_control) {
		jQuery("#tdbtnNuevotabla").css("visibility",tabla_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotabla").css("display",tabla_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartabla").css("visibility",tabla_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartabla").css("display",tabla_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartabla").css("visibility",tabla_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartabla").css("display",tabla_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartabla").css("visibility",tabla_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostabla").css("visibility",tabla_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostabla").css("display",tabla_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartabla").css("visibility",tabla_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartabla").css("visibility",tabla_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartabla").css("visibility",tabla_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_corriente_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
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

	actualizarCamposFilaTabla(tabla_control) {
		var i=0;
		
		i=tabla_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tabla_control.tablaActual.id);
		jQuery("#t-version_row_"+i+"").val(tabla_control.tablaActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tabla_control.tablaActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tabla_control.tablaActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(tabla_control.tablaActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tabla_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente_detalle").click(function(){
		jQuery("#tblTablaDatostablas").on("click",".imgrelacioncuenta_corriente_detalle", function () {

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_corriente_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tabla","cuenta_corriente_detalle","general","",tabla_funcion1,tabla_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(tabla_control) {
		tabla_funcion1.registrarControlesTableValidacionEdition(tabla_control,tabla_webcontrol1,tabla_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tablaConstante,strParametros);
		
		//tabla_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tabla_control
		
	
	}
	
	onLoadCombosDefectoFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tabla");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tabla");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tabla_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
			if(tabla_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,"tabla");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tabla");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tabla_funcion1.validarFormularioJQuery(tabla_constante1);
			
			if(tabla_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tabla","general","",tabla_funcion1,tabla_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tabla_control) {
		
		jQuery("#divBusquedatablaAjaxWebPart").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trtablaCabeceraBusquedas").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trBusquedatabla").css("display",tabla_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetabla").css("display",tabla_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostabla").attr("style",tabla_control.strPermisoMostrarTodos);
		
		if(tabla_control.strPermisoNuevo!=null) {
			jQuery("#tdtablaNuevo").css("display",tabla_control.strPermisoNuevo);
			jQuery("#tdtablaNuevoToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtablaDuplicar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtablaDuplicarToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtablaNuevoGuardarCambios").css("display",tabla_control.strPermisoNuevo);
			jQuery("#tdtablaNuevoGuardarCambiosToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tabla_control.strPermisoActualizar!=null) {
			jQuery("#tdtablaActualizarToolBar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtablaCopiar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtablaCopiarToolBar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtablaConEditar").css("display",tabla_control.strPermisoActualizar);
		}
		
		jQuery("#tdtablaEliminarToolBar").css("display",tabla_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtablaGuardarCambios").css("display",tabla_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtablaGuardarCambiosToolBar").css("display",tabla_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtablaElementos").css("display",tabla_control.strVisibleTablaElementos);
		
		jQuery("#trtablaAcciones").css("display",tabla_control.strVisibleTablaAcciones);
		jQuery("#trtablaParametrosAcciones").css("display",tabla_control.strVisibleTablaAcciones);
			
		jQuery("#tdtablaCerrarPagina").css("display",tabla_control.strPermisoPopup);		
		jQuery("#tdtablaCerrarPaginaToolBar").css("display",tabla_control.strPermisoPopup);
		//jQuery("#trtablaAccionesRelaciones").css("display",tabla_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tabla","general","",tabla_funcion1,tabla_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarEventosControles();
		
		if(tabla_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			tabla_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tabla_constante1.STR_ES_RELACIONES=="true") {
			if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				tabla_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tabla_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tabla_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tabla_webcontrol1.onLoad();
				
			} else {
				if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tabla_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
						//tabla_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tabla_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tabla_constante1.BIG_ID_ACTUAL,"tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
						//tabla_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tabla_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tabla_webcontrol1=new tabla_webcontrol();

if(tabla_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tabla_webcontrol1.onLoadWindow; 
}

//</script>