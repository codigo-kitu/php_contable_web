//<script type="text/javascript" language="javascript">



//var usuarioJQueryPaginaWebInteraccion= function (usuario_control) {
//this.,this.,this.

class usuario_webcontrol extends usuario_webcontrol_add {
	
	usuario_control=null;
	usuario_controlInicial=null;
	usuario_controlAuxiliar=null;
		
	//if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(usuario_control) {
		super();
		
		this.usuario_control=usuario_control;
	}
		
	actualizarVariablesPagina(usuario_control) {
		
		if(usuario_control.action=="index" || usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(usuario_control);
			
		} else if(usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(usuario_control);
		
		} else if(usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(usuario_control);
		
		} else if(usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(usuario_control);
		
		} else if(usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(usuario_control);
			
		} else if(usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(usuario_control);
			
		} else if(usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(usuario_control);
		
		} else if(usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(usuario_control);
		
		} else if(usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(usuario_control);
		
		} else if(usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(usuario_control);
		
		} else if(usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(usuario_control);
		
		} else if(usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(usuario_control);
		
		} else if(usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(usuario_control);
		
		} else if(usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(usuario_control);
		
		} else if(usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(usuario_control);
		
		} else if(usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(usuario_control);
		
		} else if(usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(usuario_control);
		
		} else if(usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(usuario_control);
		
		} else if(usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(usuario_control);
		
		} else if(usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(usuario_control);
		
		} else if(usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(usuario_control);
		
		} else if(usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(usuario_control);
		
		} else if(usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(usuario_control);
		
		} else if(usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(usuario_control);		
		
		} else if(usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(usuario_control);		
		
		} else if(usuario_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(usuario_control);		
		
		} else if(usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control);		
		}
		else if(usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(usuario_control);		
		}
		else if(usuario_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(usuario_control.action + " Revisar Manejo");
			
			if(usuario_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(usuario_control);
				
				return;
			}
			
			//if(usuario_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(usuario_control);
			//}
			
			if(usuario_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && usuario_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(usuario_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(usuario_control, false);			
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(usuario_control);	
			}
			
			if(usuario_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(usuario_control);	
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(usuario_control);
			}
			
			
			if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(usuario_control);			
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(usuario_control);
			}
			
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
			}
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(usuario_control);
			}				
			
			if(usuario_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control);
			}
			
			if(usuario_control.usuarioActual!=null && usuario_control.usuarioActual.field_strUserName!=null &&
			usuario_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(usuario_control);			
			}
		}
		
		
		if(usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(usuario_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(usuario_control) {
		
		this.actualizarPaginaCargaGeneral(usuario_control);
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
		this.actualizarPaginaAreaBusquedas(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(usuario_control) {
		
		this.actualizarPaginaCargaGeneral(usuario_control);
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
		this.actualizarPaginaAreaBusquedas(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(usuario_control) {
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(usuario_control) {
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(usuario_control) {
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(usuario_control) {
		this.actualizarPaginaAbrirLink(usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);				
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(usuario_control) {
		this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(usuario_control) {
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(usuario_control) {
		this.actualizarPaginaAbrirLink(usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(usuario_control) {
		this.actualizarPaginaImprimir(usuario_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(usuario_control) {
		this.actualizarPaginaImprimir(usuario_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(usuario_control) {
		//FORMULARIO
		if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(usuario_control);
			this.actualizarPaginaFormularioAdd(usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//COMBOS FK
		if(usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(usuario_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(usuario_control) {
		//FORMULARIO
		if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);	
		//COMBOS FK
		if(usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(usuario_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(usuario_control) {
		if(usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(usuario_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(usuario_control) {
		if(usuario_funcion1.esPaginaForm()==true) {
			window.opener.usuario_webcontrol1.actualizarPaginaTablaDatos(usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(usuario_control) {
		usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(usuario_control.strAuxiliarUrlPagina);
				
		usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(usuario_control.strAuxiliarTipo,usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(usuario_control) {
		usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
			
		if(usuario_funcion1.esPaginaForm()==true) {
			window.opener.usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(usuario_control) {
		eval(usuario_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(usuario_control, mostrar) {
		
		if(mostrar==true) {
			usuario_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				usuario_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			usuario_funcion1.mostrarDivMensaje(true,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		
		} else {
			usuario_funcion1.mostrarDivMensaje(false,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(usuario_control) {
	
		funcionGeneral.printWebPartPage("usuario",usuario_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarusuariosAjaxWebPart").html(usuario_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("usuario",jQuery("#divTablaDatosReporteAuxiliarusuariosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(usuario_control) {
		this.usuario_controlInicial=usuario_control;
			
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(usuario_control.strStyleDivArbol,usuario_control.strStyleDivContent
																,usuario_control.strStyleDivOpcionesBanner,usuario_control.strStyleDivExpandirColapsar
																,usuario_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(usuario_control) {
		jQuery("#divTablaDatosusuariosAjaxWebPart").html(usuario_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosusuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosusuarios=jQuery("#tblTablaDatosusuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			usuario_webcontrol1.registrarControlesTableEdition(usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(usuario_control.usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(usuario_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(usuario_control) {
		this.actualizarCssBotonesPagina(usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(usuario_control.tiposReportes,usuario_control.tiposReporte
															 	,usuario_control.tiposPaginacion,usuario_control.tiposAcciones
																,usuario_control.tiposColumnasSelect,usuario_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(usuario_control.tiposRelaciones,usuario_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(usuario_control);			
	}
	
	actualizarPaginaAreaBusquedas(usuario_control) {
		jQuery("#divBusquedausuarioAjaxWebPart").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trusuarioCabeceraBusquedas").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedausuario").css("display",usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(usuario_control.htmlTablaOrderBy!=null
			&& usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByusuarioAjaxWebPart").html(usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(usuario_control.htmlTablaOrderByRel!=null
			&& usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelusuarioAjaxWebPart").html(usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedausuarioAjaxWebPart").css("display","none");
			jQuery("#trusuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedausuario").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(usuario_control) {
		jQuery("#tdusuarioNuevo").css("display",usuario_control.strPermisoNuevo);
		jQuery("#trusuarioElementos").css("display",usuario_control.strVisibleTablaElementos);
		jQuery("#trusuarioAcciones").css("display",usuario_control.strVisibleTablaAcciones);
		jQuery("#trusuarioParametrosAcciones").css("display",usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(usuario_control);
				
		if(usuario_control.usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(usuario_control);
	}
	
	actualizarPaginaUsuarioInvitado(usuario_control) {
	
		var indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(usuario_control) {
		jQuery("#divResumenusuarioActualAjaxWebPart").html(usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control) {
		jQuery("#divAccionesRelacionesusuarioAjaxWebPart").html(usuario_control.htmlTablaAccionesRelaciones);
			
		usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(usuario_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(usuario_control) {
		
		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",usuario_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",usuario_control.strVisibleBusquedaPorNombre);
		}

		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorUserName").attr("style",usuario_control.strVisibleBusquedaPorUserName);
			jQuery("#tblstrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorUserName").attr("style",usuario_control.strVisibleBusquedaPorUserName);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionusuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("usuario",id,"seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(usuario_control) {
	
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-id").val(usuario_control.usuarioActual.id);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-version_row").val(usuario_control.usuarioActual.versionRow);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-user_name").val(usuario_control.usuarioActual.user_name);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-clave").val(usuario_control.usuarioActual.clave);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-confirmar_clave").val(usuario_control.usuarioActual.confirmar_clave);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-nombre").val(usuario_control.usuarioActual.nombre);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-codigo_alterno").val(usuario_control.usuarioActual.codigo_alterno);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-tipo").prop('checked',usuario_control.usuarioActual.tipo);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-estado").prop('checked',usuario_control.usuarioActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("usuario","seguridad","","form_usuario",formulario,"","",paraEventoTabla,idFilaTabla,usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	cargarCombosFK(usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(usuario_control.strRecargarFkTiposNinguno!=null && usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && usuario_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(usuario_control) {
		jQuery("#spanstrMensajeid").text(usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeuser_name").text(usuario_control.strMensajeuser_name);		
		jQuery("#spanstrMensajeclave").text(usuario_control.strMensajeclave);		
		jQuery("#spanstrMensajeconfirmar_clave").text(usuario_control.strMensajeconfirmar_clave);		
		jQuery("#spanstrMensajenombre").text(usuario_control.strMensajenombre);		
		jQuery("#spanstrMensajecodigo_alterno").text(usuario_control.strMensajecodigo_alterno);		
		jQuery("#spanstrMensajetipo").text(usuario_control.strMensajetipo);		
		jQuery("#spanstrMensajeestado").text(usuario_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(usuario_control) {
		jQuery("#tdbtnNuevousuario").css("visibility",usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevousuario").css("display",usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarusuario").css("visibility",usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarusuario").css("display",usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarusuario").css("visibility",usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarusuario").css("display",usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarusuario").css("visibility",usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosusuario").css("visibility",usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosusuario").css("display",usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});
		jQuery("#imgdivrelacionauditoria").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaauditorias(idActual);
		});
		jQuery("#imgdivrelacionhistorial_cambio_clave").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParahistorial_cambio_claves(idActual);
		});
		jQuery("#imgdivrelacionparametro_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaparametro_general_usuarioes(idActual);
		});
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacionresumen_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionPararesumen_usuarios(idActual);
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

	actualizarCamposFilaTabla(usuario_control) {
		var i=0;
		
		i=usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(usuario_control.usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(usuario_control.usuarioActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(usuario_control.usuarioActual.user_name);
		jQuery("#t-cel_"+i+"_3").val(usuario_control.usuarioActual.clave);
		jQuery("#t-cel_"+i+"_4").val(usuario_control.usuarioActual.confirmar_clave);
		jQuery("#t-cel_"+i+"_5").val(usuario_control.usuarioActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(usuario_control.usuarioActual.codigo_alterno);
		jQuery("#t-cel_"+i+"_7").prop('checked',usuario_control.usuarioActual.tipo);
		jQuery("#t-cel_"+i+"_8").prop('checked',usuario_control.usuarioActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionperfil_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionauditoria").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionauditoria", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaauditorias(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionhistorial_cambio_clave").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionhistorial_cambio_clave", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParahistorial_cambio_claves(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_general_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionparametro_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaparametro_general_usuarioes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionresumen_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionresumen_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionPararesumen_usuarios(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","perfil_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"s","");
	}

	registrarSesionParaauditorias(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","auditoria","seguridad","",usuario_funcion1,usuario_webcontrol1,"s","");
	}

	registrarSesionParahistorial_cambio_claves(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","historial_cambio_clave","seguridad","",usuario_funcion1,usuario_webcontrol1,"s","");
	}

	registrarSesionParaparametro_general_usuarioes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","parametro_general_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"es","");
	}

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","dato_general_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"s","");
	}

	registrarSesionPararesumen_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","resumen_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(usuario_control) {
		usuario_funcion1.registrarControlesTableValidacionEdition(usuario_control,usuario_webcontrol1,usuario_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuarioConstante,strParametros);
		
		//usuario_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("usuario");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("usuario");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
			if(usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("usuario","BusquedaPorNombre","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("usuario","BusquedaPorUserName","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("usuario");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			usuario_funcion1.validarFormularioJQuery(usuario_constante1);
			
			if(usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(usuario_control) {
		
		jQuery("#divBusquedausuarioAjaxWebPart").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trusuarioCabeceraBusquedas").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedausuario").css("display",usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteusuario").css("display",usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosusuario").attr("style",usuario_control.strPermisoMostrarTodos);
		
		if(usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdusuarioNuevo").css("display",usuario_control.strPermisoNuevo);
			jQuery("#tdusuarioNuevoToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdusuarioDuplicar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdusuarioDuplicarToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdusuarioNuevoGuardarCambios").css("display",usuario_control.strPermisoNuevo);
			jQuery("#tdusuarioNuevoGuardarCambiosToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdusuarioActualizarToolBar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdusuarioCopiar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdusuarioCopiarToolBar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdusuarioConEditar").css("display",usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdusuarioEliminarToolBar").css("display",usuario_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdusuarioGuardarCambios").css("display",usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdusuarioGuardarCambiosToolBar").css("display",usuario_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trusuarioElementos").css("display",usuario_control.strVisibleTablaElementos);
		
		jQuery("#trusuarioAcciones").css("display",usuario_control.strVisibleTablaAcciones);
		jQuery("#trusuarioParametrosAcciones").css("display",usuario_control.strVisibleTablaAcciones);
			
		jQuery("#tdusuarioCerrarPagina").css("display",usuario_control.strPermisoPopup);		
		jQuery("#tdusuarioCerrarPaginaToolBar").css("display",usuario_control.strPermisoPopup);
		//jQuery("#trusuarioAccionesRelaciones").css("display",usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarEventosControles();
		
		if(usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(usuario_constante1.STR_ES_RELACIONES=="true") {
			if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				usuario_webcontrol1.onLoad();
				
			} else {
				if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
					if(usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
						//usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(usuario_constante1.BIG_ID_ACTUAL,"usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
						//usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			usuario_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var usuario_webcontrol1=new usuario_webcontrol();

if(usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = usuario_webcontrol1.onLoadWindow; 
}

//</script>