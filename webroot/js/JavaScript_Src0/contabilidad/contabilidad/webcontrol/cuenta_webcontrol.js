//<script type="text/javascript" language="javascript">



//var cuentaJQueryPaginaWebInteraccion= function (cuenta_control) {
//this.,this.,this.

class cuenta_webcontrol extends cuenta_webcontrol_add {
	
	cuenta_control=null;
	cuenta_controlInicial=null;
	cuenta_controlAuxiliar=null;
		
	//if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_control) {
		super();
		
		this.cuenta_control=cuenta_control;
	}
		
	actualizarVariablesPagina(cuenta_control) {
		
		if(cuenta_control.action=="index" || cuenta_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_control);
			
		} else if(cuenta_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_control);
		
		} else if(cuenta_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_control);
		
		} else if(cuenta_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_control);
		
		} else if(cuenta_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_control);
			
		} else if(cuenta_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_control);
			
		} else if(cuenta_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_control);
		
		} else if(cuenta_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_control);
		
		} else if(cuenta_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_control);
		
		} else if(cuenta_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_control);
		
		} else if(cuenta_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_control);
		
		} else if(cuenta_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_control);
		
		} else if(cuenta_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_control);
		
		} else if(cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_control);
		
		} else if(cuenta_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_control);
		
		} else if(cuenta_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_control);
		
		} else if(cuenta_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_control);
		
		} else if(cuenta_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_control);		
		
		} else if(cuenta_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_control);		
		
		} else if(cuenta_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_control);		
		
		} else if(cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control);		
		}
		else if(cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_control);		
		}
		else if(cuenta_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_control);		
		}
		else if(cuenta_control.action=="abrirArbol") {
			this.actualizarVariablesPaginaAccionAbrirArbol(cuenta_control);
		}
		else if(cuenta_control.action=="cargarArbol") {
			this.actualizarVariablesPaginaAccionCargarArbol(cuenta_control);
		}
		else if(cuenta_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(cuenta_control.action + " Revisar Manejo");
			
			if(cuenta_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(cuenta_control);
				
				return;
			}
			
			//if(cuenta_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(cuenta_control);
			//}
			
			if(cuenta_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(cuenta_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(cuenta_control, false);			
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(cuenta_control);	
			}
			
			if(cuenta_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(cuenta_control);	
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(cuenta_control);
			}
			
			
			if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(cuenta_control);			
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(cuenta_control);
			}
			
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
			}
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(cuenta_control);
			}				
			
			if(cuenta_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control);
			}
			
			if(cuenta_control.usuarioActual!=null && cuenta_control.usuarioActual.field_strUserName!=null &&
			cuenta_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(cuenta_control);			
			}
		}
		
		
		if(cuenta_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_control);
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
		this.actualizarPaginaAreaBusquedas(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_control);
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
		this.actualizarPaginaAreaBusquedas(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_control) {
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_control) {
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_control) {
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);				
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_control) {
		this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_control) {
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_control) {
		this.actualizarPaginaImprimir(cuenta_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_control) {
		this.actualizarPaginaImprimir(cuenta_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);
			this.actualizarPaginaFormularioAdd(cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);	
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);	
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	
	actualizarVariablesPaginaAccionAbrirArbol(cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionCargarArbol(cuenta_control) {
		
	}
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(cuenta_control) {
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_control) {
		if(cuenta_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_webcontrol1.actualizarPaginaTablaDatos(cuenta_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_control) {
		cuenta_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_control.strAuxiliarUrlPagina);
				
		cuenta_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_control.strAuxiliarTipo,cuenta_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_control) {
		cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
			
		if(cuenta_funcion1.esPaginaForm()==true) {
			window.opener.cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(cuenta_control) {
		eval(cuenta_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(cuenta_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			cuenta_funcion1.mostrarDivMensaje(true,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_funcion1.mostrarDivMensaje(false,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(cuenta_control) {
	
		funcionGeneral.printWebPartPage("cuenta",cuenta_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcuentasAjaxWebPart").html(cuenta_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("cuenta",jQuery("#divTablaDatosReporteAuxiliarcuentasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(cuenta_control) {
		this.cuenta_controlInicial=cuenta_control;
			
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_control.strStyleDivArbol,cuenta_control.strStyleDivContent
																,cuenta_control.strStyleDivOpcionesBanner,cuenta_control.strStyleDivExpandirColapsar
																,cuenta_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(cuenta_control) {
		jQuery("#divTablaDatoscuentasAjaxWebPart").html(cuenta_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuentas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuentas=jQuery("#tblTablaDatoscuentas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_webcontrol1.registrarControlesTableEdition(cuenta_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(cuenta_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_control.cuentaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(cuenta_control) {
		this.actualizarCssBotonesPagina(cuenta_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_control.tiposReportes,cuenta_control.tiposReporte
															 	,cuenta_control.tiposPaginacion,cuenta_control.tiposAcciones
																,cuenta_control.tiposColumnasSelect,cuenta_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_control.tiposRelaciones,cuenta_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_control);			
	}
	
	actualizarPaginaAreaBusquedas(cuenta_control) {
		jQuery("#divBusquedacuentaAjaxWebPart").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trcuentaCabeceraBusquedas").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta").css("display",cuenta_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_control.htmlTablaOrderBy!=null
			&& cuenta_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuentaAjaxWebPart").html(cuenta_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_control.htmlTablaOrderByRel!=null
			&& cuenta_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuentaAjaxWebPart").html(cuenta_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuentaAjaxWebPart").css("display","none");
			jQuery("#trcuentaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(cuenta_control) {
		jQuery("#tdcuentaNuevo").css("display",cuenta_control.strPermisoNuevo);
		jQuery("#trcuentaElementos").css("display",cuenta_control.strVisibleTablaElementos);
		jQuery("#trcuentaAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
		jQuery("#trcuentaParametrosAcciones").css("display",cuenta_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_control);
				
		if(cuenta_control.cuentaActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_control);
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_control) {
	
		var indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_control) {
		jQuery("#divResumencuentaActualAjaxWebPart").html(cuenta_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control) {
		jQuery("#divAccionesRelacionescuentaAjaxWebPart").html(cuenta_control.htmlTablaAccionesRelaciones);
			
		cuenta_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_control) {
		
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_control.strVisibleFK_Idcuenta);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_control.strVisibleFK_Idempresa);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_cuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_cuenta);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_nivel_cuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_nivel_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta",id,"contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","empresa","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParatipo_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","tipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParatipo_nivel_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","tipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_control) {
	
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id").val(cuenta_control.cuentaActual.id);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-version_row").val(cuenta_control.cuentaActual.versionRow);
		
		if(cuenta_control.cuentaActual.id_empresa!=null && cuenta_control.cuentaActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_control.cuentaActual.id_empresa) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_control.cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_cuenta!=null && cuenta_control.cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_control.cuentaActual.id_tipo_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_control.cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_nivel_cuenta!=null && cuenta_control.cuentaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_control.cuentaActual.id_tipo_nivel_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_control.cuentaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_cuenta!=null && cuenta_control.cuentaActual.id_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_control.cuentaActual.id_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_control.cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-codigo").val(cuenta_control.cuentaActual.codigo);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-nombre").val(cuenta_control.cuentaActual.nombre);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-nivel_cuenta").val(cuenta_control.cuentaActual.nivel_cuenta);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-es_detalle").prop('checked',cuenta_control.cuentaActual.es_detalle);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_centro_costos").prop('checked',cuenta_control.cuentaActual.con_centro_costos);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_ruc").prop('checked',cuenta_control.cuentaActual.con_ruc);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-porcentaje_base").val(cuenta_control.cuentaActual.porcentaje_base);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-usa_monto_minimo").prop('checked',cuenta_control.cuentaActual.usa_monto_minimo);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-monto_minimo").val(cuenta_control.cuentaActual.monto_minimo);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_retencion").prop('checked',cuenta_control.cuentaActual.con_retencion);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-valor_retencion").val(cuenta_control.cuentaActual.valor_retencion);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-balance").val(cuenta_control.cuentaActual.balance);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-comentario").val(cuenta_control.cuentaActual.comentario);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-ultima_transaccion").val(cuenta_control.cuentaActual.ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta","contabilidad","","form_cuenta",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	cargarCombosFK(cuenta_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_control.strRecargarFkTiposNinguno!=null && cuenta_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(cuenta_control) {
		jQuery("#spanstrMensajeid").text(cuenta_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_cuenta").text(cuenta_control.strMensajeid_tipo_cuenta);		
		jQuery("#spanstrMensajeid_tipo_nivel_cuenta").text(cuenta_control.strMensajeid_tipo_nivel_cuenta);		
		jQuery("#spanstrMensajeid_cuenta").text(cuenta_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecodigo").text(cuenta_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(cuenta_control.strMensajenombre);		
		jQuery("#spanstrMensajenivel_cuenta").text(cuenta_control.strMensajenivel_cuenta);		
		jQuery("#spanstrMensajees_detalle").text(cuenta_control.strMensajees_detalle);		
		jQuery("#spanstrMensajecon_centro_costos").text(cuenta_control.strMensajecon_centro_costos);		
		jQuery("#spanstrMensajecon_ruc").text(cuenta_control.strMensajecon_ruc);		
		jQuery("#spanstrMensajeporcentaje_base").text(cuenta_control.strMensajeporcentaje_base);		
		jQuery("#spanstrMensajeusa_monto_minimo").text(cuenta_control.strMensajeusa_monto_minimo);		
		jQuery("#spanstrMensajemonto_minimo").text(cuenta_control.strMensajemonto_minimo);		
		jQuery("#spanstrMensajecon_retencion").text(cuenta_control.strMensajecon_retencion);		
		jQuery("#spanstrMensajevalor_retencion").text(cuenta_control.strMensajevalor_retencion);		
		jQuery("#spanstrMensajebalance").text(cuenta_control.strMensajebalance);		
		jQuery("#spanstrMensajecomentario").text(cuenta_control.strMensajecomentario);		
		jQuery("#spanstrMensajeultima_transaccion").text(cuenta_control.strMensajeultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_control) {
		jQuery("#tdbtnNuevocuenta").css("visibility",cuenta_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta").css("display",cuenta_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta").css("visibility",cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta").css("display",cuenta_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta").css("visibility",cuenta_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta").css("display",cuenta_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta").css("visibility",cuenta_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta").css("visibility",cuenta_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta").css("display",cuenta_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciontermino_pago_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});
		jQuery("#imgdivrelacionretencion_fuente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetencion_fuentees(idActual);
		});
		jQuery("#imgdivrelacionforma_pago_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		});
		jQuery("#imgdivrelacionretencion_ica").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetencion_icas(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacioninstrumento_pago").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParainstrumento_pagos(idActual);
		});
		jQuery("#imgdivrelacionretencion").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetenciones(idActual);
		});
		jQuery("#imgdivrelacioncuenta").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		});
		jQuery("#imgdivrelaciontermino_pago_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});
		jQuery("#imgdivrelacionsaldo_cuenta").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		});
		jQuery("#imgdivrelacionotro_impuesto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaotro_impuestos(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});
		jQuery("#imgdivrelacionimpuesto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaimpuestos(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacioncuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		jQuery("#imgdivrelacionforma_pago_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		});
		jQuery("#imgdivrelacioncategoria_cheque").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		});
		jQuery("#imgdivrelacionasiento_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_nivel_cuentasFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(cuenta_control) {
		var i=0;
		
		i=cuenta_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_control.cuentaActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_control.cuentaActual.versionRow);
		
		if(cuenta_control.cuentaActual.id_empresa!=null && cuenta_control.cuentaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_control.cuentaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_control.cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_cuenta!=null && cuenta_control.cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_control.cuentaActual.id_tipo_cuenta) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_control.cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_nivel_cuenta!=null && cuenta_control.cuentaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_control.cuentaActual.id_tipo_nivel_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_control.cuentaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_cuenta!=null && cuenta_control.cuentaActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_control.cuentaActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_control.cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_5").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(cuenta_control.cuentaActual.codigo);
		jQuery("#t-cel_"+i+"_7").val(cuenta_control.cuentaActual.nombre);
		jQuery("#t-cel_"+i+"_8").val(cuenta_control.cuentaActual.nivel_cuenta);
		jQuery("#t-cel_"+i+"_9").prop('checked',cuenta_control.cuentaActual.es_detalle);
		jQuery("#t-cel_"+i+"_10").prop('checked',cuenta_control.cuentaActual.con_centro_costos);
		jQuery("#t-cel_"+i+"_11").prop('checked',cuenta_control.cuentaActual.con_ruc);
		jQuery("#t-cel_"+i+"_12").val(cuenta_control.cuentaActual.porcentaje_base);
		jQuery("#t-cel_"+i+"_13").prop('checked',cuenta_control.cuentaActual.usa_monto_minimo);
		jQuery("#t-cel_"+i+"_14").val(cuenta_control.cuentaActual.monto_minimo);
		jQuery("#t-cel_"+i+"_15").prop('checked',cuenta_control.cuentaActual.con_retencion);
		jQuery("#t-cel_"+i+"_16").val(cuenta_control.cuentaActual.valor_retencion);
		jQuery("#t-cel_"+i+"_17").val(cuenta_control.cuentaActual.balance);
		jQuery("#t-cel_"+i+"_18").val(cuenta_control.cuentaActual.comentario);
		jQuery("#t-cel_"+i+"_19").val(cuenta_control.cuentaActual.ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_proveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelaciontermino_pago_proveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_fuente_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_fuente_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasPararetencion_fuentees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionforma_pago_proveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionforma_pago_proveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_ica_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_ica_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasPararetencion_icas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioninstrumento_pago_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioninstrumento_pago_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasParainstrumento_pagos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasPararetenciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncuenta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_cliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelaciontermino_pago_cliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsaldo_cuenta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionsaldo_cuenta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_impuesto_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionotro_impuesto_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasParaotro_impuestos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_inventario").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionlista_producto_inventario", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_inventarioParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_predefinido_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimpuesto_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionimpuesto_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasParaimpuestos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_compra").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionproducto_compra", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_compraParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionforma_pago_cliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionforma_pago_cliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncategoria_cheque").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncategoria_cheque", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});				
	}
		
	

	registrarSesionParatermino_pago_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","termino_pago_proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","");
	}

	registrarSesion_comprasPararetencion_fuentees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion_fuente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","_compras");
	}

	registrarSesionParaforma_pago_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","forma_pago_proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","");
	}

	registrarSesion_comprasPararetencion_icas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion_ica","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","_compras");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesion_comprasParainstrumento_pagos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","instrumento_pago","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","_compras");
	}

	registrarSesion_comprasPararetenciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","_compras");
	}

	registrarSesionParacuentaes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","");
	}

	registrarSesionParatermino_pago_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","termino_pago_cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesionParasaldo_cuentas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","saldo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesion_ventasParaotro_impuestos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","otro_impuesto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","_ventas");
	}

	registrarSesion_inventarioParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","lista_producto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","_inventario");
	}

	registrarSesionParaasiento_predefinido_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_predefinido_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesion_ventasParaimpuestos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","impuesto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","_ventas");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","");
	}

	registrarSesionParacuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cuenta_corriente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesion_compraParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","producto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","_compra");
	}

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_automatico_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesionParaforma_pago_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","forma_pago_cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesionParacategoria_cheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","categoria_cheque","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"s","");
	}

	registrarSesionParaasiento_detallees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(cuenta_control) {
		cuenta_funcion1.registrarControlesTableValidacionEdition(cuenta_control,cuenta_webcontrol1,cuenta_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuentaConstante,strParametros);
		
		//cuenta_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa",cuenta_control.empresasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_2",cuenta_control.empresasFK);
		}
	};

	cargarCombostipo_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_control.tipo_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_3",cuenta_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_4",cuenta_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

	};

	cargarComboscuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta",cuenta_control.cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_5",cuenta_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorComboscuentasFK(cuenta_control);
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
	onLoadCombosEventosFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
			if(cuenta_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"cuenta");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idcuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idempresa","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idtipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idtipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			cuenta_funcion1.validarFormularioJQuery(cuenta_constante1);
			
			if(cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_control) {
		
		jQuery("#divBusquedacuentaAjaxWebPart").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trcuentaCabeceraBusquedas").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta").css("display",cuenta_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta").css("display",cuenta_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta").attr("style",cuenta_control.strPermisoMostrarTodos);
		
		if(cuenta_control.strPermisoNuevo!=null) {
			jQuery("#tdcuentaNuevo").css("display",cuenta_control.strPermisoNuevo);
			jQuery("#tdcuentaNuevoToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuentaDuplicar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuentaDuplicarToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuentaNuevoGuardarCambios").css("display",cuenta_control.strPermisoNuevo);
			jQuery("#tdcuentaNuevoGuardarCambiosToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdcuentaActualizarToolBar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuentaCopiar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuentaCopiarToolBar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuentaConEditar").css("display",cuenta_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuentaEliminarToolBar").css("display",cuenta_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcuentaGuardarCambios").css("display",cuenta_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuentaGuardarCambiosToolBar").css("display",cuenta_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcuentaElementos").css("display",cuenta_control.strVisibleTablaElementos);
		
		jQuery("#trcuentaAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
		jQuery("#trcuentaParametrosAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
			
		jQuery("#tdcuentaCerrarPagina").css("display",cuenta_control.strPermisoPopup);		
		jQuery("#tdcuentaCerrarPaginaToolBar").css("display",cuenta_control.strPermisoPopup);
		//jQuery("#trcuentaAccionesRelaciones").css("display",cuenta_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarEventosControles();
		
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_webcontrol1.onLoad();
				
			} else {
				if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
					if(cuenta_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
						//cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(cuenta_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_constante1.BIG_ID_ACTUAL,"cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
						//cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			cuenta_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var cuenta_webcontrol1=new cuenta_webcontrol();

if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_webcontrol1.onLoadWindow; 
}

//</script>