//<script type="text/javascript" language="javascript">



//var archivoJQueryPaginaWebInteraccion= function (archivo_control) {
//this.,this.,this.

class archivo_webcontrol extends archivo_webcontrol_add {
	
	archivo_control=null;
	archivo_controlInicial=null;
	archivo_controlAuxiliar=null;
		
	//if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(archivo_control) {
		super();
		
		this.archivo_control=archivo_control;
	}
		
	actualizarVariablesPagina(archivo_control) {
		
		if(archivo_control.action=="index" || archivo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(archivo_control);
			
		} else if(archivo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(archivo_control);
		
		} else if(archivo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(archivo_control);
		
		} else if(archivo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(archivo_control);
		
		} else if(archivo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(archivo_control);
			
		} else if(archivo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(archivo_control);
			
		} else if(archivo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(archivo_control);
		
		} else if(archivo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(archivo_control);
		
		} else if(archivo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(archivo_control);
		
		} else if(archivo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(archivo_control);
		
		} else if(archivo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(archivo_control);
		
		} else if(archivo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(archivo_control);
		
		} else if(archivo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(archivo_control);
		
		} else if(archivo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(archivo_control);
		
		} else if(archivo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(archivo_control);
		
		} else if(archivo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(archivo_control);
		
		} else if(archivo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(archivo_control);
		
		} else if(archivo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(archivo_control);
		
		} else if(archivo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(archivo_control);
		
		} else if(archivo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(archivo_control);
		
		} else if(archivo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(archivo_control);
		
		} else if(archivo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(archivo_control);
		
		} else if(archivo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(archivo_control);
		
		} else if(archivo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(archivo_control);		
		
		} else if(archivo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(archivo_control);		
		
		} else if(archivo_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(archivo_control);		
		
		} else if(archivo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control);		
		}
		else if(archivo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(archivo_control);		
		}
		else if(archivo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(archivo_control.action + " Revisar Manejo");
			
			if(archivo_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(archivo_control);
				
				return;
			}
			
			//if(archivo_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(archivo_control);
			//}
			
			if(archivo_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && archivo_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(archivo_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(archivo_control, false);			
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(archivo_control);	
			}
			
			if(archivo_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(archivo_control);	
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(archivo_control);
			}
			
			
			if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(archivo_control);			
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(archivo_control);
			}
			
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
			}
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(archivo_control);
			}				
			
			if(archivo_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control);
			}
			
			if(archivo_control.usuarioActual!=null && archivo_control.usuarioActual.field_strUserName!=null &&
			archivo_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(archivo_control);			
			}
		}
		
		
		if(archivo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(archivo_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(archivo_control) {
		
		this.actualizarPaginaCargaGeneral(archivo_control);
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
		this.actualizarPaginaAreaBusquedas(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(archivo_control) {
		
		this.actualizarPaginaCargaGeneral(archivo_control);
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
		this.actualizarPaginaAreaBusquedas(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(archivo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(archivo_control) {
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(archivo_control) {
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(archivo_control) {
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(archivo_control) {
		this.actualizarPaginaAbrirLink(archivo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);				
		this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(archivo_control) {
		this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(archivo_control) {
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(archivo_control) {
		this.actualizarPaginaAbrirLink(archivo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(archivo_control) {
		this.actualizarPaginaImprimir(archivo_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(archivo_control) {
		this.actualizarPaginaImprimir(archivo_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(archivo_control) {
		//FORMULARIO
		if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(archivo_control);
			this.actualizarPaginaFormularioAdd(archivo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//COMBOS FK
		if(archivo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(archivo_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(archivo_control) {
		//FORMULARIO
		if(archivo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(archivo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);	
		//COMBOS FK
		if(archivo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(archivo_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(archivo_control) {
		if(archivo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && archivo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(archivo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(archivo_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(archivo_control) {
		if(archivo_funcion1.esPaginaForm()==true) {
			window.opener.archivo_webcontrol1.actualizarPaginaTablaDatos(archivo_control);
		} else {
			this.actualizarPaginaTablaDatos(archivo_control);
		}
	}
	
	actualizarPaginaAbrirLink(archivo_control) {
		archivo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(archivo_control.strAuxiliarUrlPagina);
				
		archivo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(archivo_control.strAuxiliarTipo,archivo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(archivo_control) {
		archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
			
		if(archivo_funcion1.esPaginaForm()==true) {
			window.opener.archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(archivo_control) {
		eval(archivo_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(archivo_control, mostrar) {
		
		if(mostrar==true) {
			archivo_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				archivo_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			archivo_funcion1.mostrarDivMensaje(true,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		
		} else {
			archivo_funcion1.mostrarDivMensaje(false,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(archivo_control) {
	
		funcionGeneral.printWebPartPage("archivo",archivo_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliararchivosAjaxWebPart").html(archivo_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("archivo",jQuery("#divTablaDatosReporteAuxiliararchivosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(archivo_control) {
		this.archivo_controlInicial=archivo_control;
			
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(archivo_control.strStyleDivArbol,archivo_control.strStyleDivContent
																,archivo_control.strStyleDivOpcionesBanner,archivo_control.strStyleDivExpandirColapsar
																,archivo_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=archivo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",archivo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(archivo_control) {
		jQuery("#divTablaDatosarchivosAjaxWebPart").html(archivo_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosarchivos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(archivo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosarchivos=jQuery("#tblTablaDatosarchivos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("archivo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',archivo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			archivo_webcontrol1.registrarControlesTableEdition(archivo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		archivo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(archivo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(archivo_control.archivoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(archivo_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(archivo_control) {
		this.actualizarCssBotonesPagina(archivo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(archivo_control.tiposReportes,archivo_control.tiposReporte
															 	,archivo_control.tiposPaginacion,archivo_control.tiposAcciones
																,archivo_control.tiposColumnasSelect,archivo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(archivo_control.tiposRelaciones,archivo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(archivo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(archivo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(archivo_control);			
	}
	
	actualizarPaginaAreaBusquedas(archivo_control) {
		jQuery("#divBusquedaarchivoAjaxWebPart").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trarchivoCabeceraBusquedas").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trBusquedaarchivo").css("display",archivo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(archivo_control.htmlTablaOrderBy!=null
			&& archivo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByarchivoAjaxWebPart").html(archivo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//archivo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(archivo_control.htmlTablaOrderByRel!=null
			&& archivo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelarchivoAjaxWebPart").html(archivo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(archivo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaarchivoAjaxWebPart").css("display","none");
			jQuery("#trarchivoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaarchivo").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(archivo_control) {
		jQuery("#tdarchivoNuevo").css("display",archivo_control.strPermisoNuevo);
		jQuery("#trarchivoElementos").css("display",archivo_control.strVisibleTablaElementos);
		jQuery("#trarchivoAcciones").css("display",archivo_control.strVisibleTablaAcciones);
		jQuery("#trarchivoParametrosAcciones").css("display",archivo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(archivo_control) {
	
		this.actualizarCssBotonesMantenimiento(archivo_control);
				
		if(archivo_control.archivoActual!=null) {//form
			
			this.actualizarCamposFormulario(archivo_control);			
		}
						
		this.actualizarSpanMensajesCampos(archivo_control);
	}
	
	actualizarPaginaUsuarioInvitado(archivo_control) {
	
		var indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(archivo_control) {
		jQuery("#divResumenarchivoActualAjaxWebPart").html(archivo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control) {
		jQuery("#divAccionesRelacionesarchivoAjaxWebPart").html(archivo_control.htmlTablaAccionesRelaciones);
			
		archivo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(archivo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(archivo_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(archivo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionarchivo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("archivo","general","",archivo_funcion1,archivo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("archivo",id,"general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(archivo_control) {
	
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-id").val(archivo_control.archivoActual.id);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-version_row").val(archivo_control.archivoActual.versionRow);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-imagen").val(archivo_control.archivoActual.imagen);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-nombre").val(archivo_control.archivoActual.nombre);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-descripcion").val(archivo_control.archivoActual.descripcion);
		jQuery("#form"+archivo_constante1.STR_SUFIJO+"-archivo").val(archivo_control.archivoActual.archivo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+archivo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("archivo","general","","form_archivo",formulario,"","",paraEventoTabla,idFilaTabla,archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	cargarCombosFK(archivo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(archivo_control.strRecargarFkTiposNinguno!=null && archivo_control.strRecargarFkTiposNinguno!='NINGUNO' && archivo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(archivo_control) {
		jQuery("#spanstrMensajeid").text(archivo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(archivo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(archivo_control.strMensajeimagen);		
		jQuery("#spanstrMensajenombre").text(archivo_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(archivo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajearchivo").text(archivo_control.strMensajearchivo);		
	}
	
	actualizarCssBotonesMantenimiento(archivo_control) {
		jQuery("#tdbtnNuevoarchivo").css("visibility",archivo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoarchivo").css("display",archivo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizararchivo").css("visibility",archivo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizararchivo").css("display",archivo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminararchivo").css("visibility",archivo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminararchivo").css("display",archivo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelararchivo").css("visibility",archivo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosarchivo").css("visibility",archivo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosarchivo").css("display",archivo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBararchivo").css("visibility",archivo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionotro_documento").click(function(){

			var idActual=jQuery(this).attr("idactualarchivo");

			archivo_webcontrol1.registrarSesionParaotro_documentoes(idActual);
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

	actualizarCamposFilaTabla(archivo_control) {
		var i=0;
		
		i=archivo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(archivo_control.archivoActual.id);
		jQuery("#t-version_row_"+i+"").val(archivo_control.archivoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(archivo_control.archivoActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(archivo_control.archivoActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(archivo_control.archivoActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(archivo_control.archivoActual.archivo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(archivo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_documento").click(function(){
		jQuery("#tblTablaDatosarchivos").on("click",".imgrelacionotro_documento", function () {

			var idActual=jQuery(this).attr("idactualarchivo");

			archivo_webcontrol1.registrarSesionParaotro_documentoes(idActual);
		});				
	}
		
	

	registrarSesionParaotro_documentoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"archivo","otro_documento","general","",archivo_funcion1,archivo_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(archivo_control) {
		archivo_funcion1.registrarControlesTableValidacionEdition(archivo_control,archivo_webcontrol1,archivo_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivoConstante,strParametros);
		
		//archivo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//archivo_control
		
	
	}
	
	onLoadCombosDefectoFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("archivo");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("archivo");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(archivo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
			if(archivo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,"archivo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("archivo");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			archivo_funcion1.validarFormularioJQuery(archivo_constante1);
			
			if(archivo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("archivo","general","",archivo_funcion1,archivo_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(archivo_control) {
		
		jQuery("#divBusquedaarchivoAjaxWebPart").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trarchivoCabeceraBusquedas").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trBusquedaarchivo").css("display",archivo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportearchivo").css("display",archivo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosarchivo").attr("style",archivo_control.strPermisoMostrarTodos);
		
		if(archivo_control.strPermisoNuevo!=null) {
			jQuery("#tdarchivoNuevo").css("display",archivo_control.strPermisoNuevo);
			jQuery("#tdarchivoNuevoToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdarchivoDuplicar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdarchivoDuplicarToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdarchivoNuevoGuardarCambios").css("display",archivo_control.strPermisoNuevo);
			jQuery("#tdarchivoNuevoGuardarCambiosToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(archivo_control.strPermisoActualizar!=null) {
			jQuery("#tdarchivoActualizarToolBar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdarchivoCopiar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdarchivoCopiarToolBar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdarchivoConEditar").css("display",archivo_control.strPermisoActualizar);
		}
		
		jQuery("#tdarchivoEliminarToolBar").css("display",archivo_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdarchivoGuardarCambios").css("display",archivo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdarchivoGuardarCambiosToolBar").css("display",archivo_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trarchivoElementos").css("display",archivo_control.strVisibleTablaElementos);
		
		jQuery("#trarchivoAcciones").css("display",archivo_control.strVisibleTablaAcciones);
		jQuery("#trarchivoParametrosAcciones").css("display",archivo_control.strVisibleTablaAcciones);
			
		jQuery("#tdarchivoCerrarPagina").css("display",archivo_control.strPermisoPopup);		
		jQuery("#tdarchivoCerrarPaginaToolBar").css("display",archivo_control.strPermisoPopup);
		//jQuery("#trarchivoAccionesRelaciones").css("display",archivo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("archivo","general","",archivo_funcion1,archivo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarEventosControles();
		
		if(archivo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			archivo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(archivo_constante1.STR_ES_RELACIONES=="true") {
			if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				archivo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(archivo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(archivo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				archivo_webcontrol1.onLoad();
				
			} else {
				if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
					if(archivo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
						//archivo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(archivo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(archivo_constante1.BIG_ID_ACTUAL,"archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
						//archivo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			archivo_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var archivo_webcontrol1=new archivo_webcontrol();

if(archivo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = archivo_webcontrol1.onLoadWindow; 
}

//</script>