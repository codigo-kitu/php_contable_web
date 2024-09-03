//<script type="text/javascript" language="javascript">



//var categoria_clienteJQueryPaginaWebInteraccion= function (categoria_cliente_control) {
//this.,this.,this.

class categoria_cliente_webcontrol extends categoria_cliente_webcontrol_add {
	
	categoria_cliente_control=null;
	categoria_cliente_controlInicial=null;
	categoria_cliente_controlAuxiliar=null;
		
	//if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_cliente_control) {
		super();
		
		this.categoria_cliente_control=categoria_cliente_control;
	}
		
	actualizarVariablesPagina(categoria_cliente_control) {
		
		if(categoria_cliente_control.action=="index" || categoria_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control);		
		}
		else if(categoria_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control);		
		}
		else if(categoria_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(categoria_cliente_control.action + " Revisar Manejo");
			
			if(categoria_cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(categoria_cliente_control);
				
				return;
			}
			
			//if(categoria_cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(categoria_cliente_control);
			//}
			
			if(categoria_cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(categoria_cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(categoria_cliente_control, false);			
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(categoria_cliente_control);	
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(categoria_cliente_control);	
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(categoria_cliente_control);
			}
			
			
			if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(categoria_cliente_control);			
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(categoria_cliente_control);
			}
			
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(categoria_cliente_control);
			}				
			
			if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control);
			}
			
			if(categoria_cliente_control.usuarioActual!=null && categoria_cliente_control.usuarioActual.field_strUserName!=null &&
			categoria_cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(categoria_cliente_control);			
			}
		}
		
		
		if(categoria_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(categoria_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cliente_control);
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
		this.actualizarPaginaAreaBusquedas(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cliente_control);
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
		this.actualizarPaginaAreaBusquedas(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_cliente_control) {
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(categoria_cliente_control) {
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);				
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(categoria_cliente_control) {
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cliente_control) {
		this.actualizarPaginaImprimir(categoria_cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cliente_control) {
		this.actualizarPaginaImprimir(categoria_cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cliente_control) {
		//FORMULARIO
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cliente_control);
			this.actualizarPaginaFormularioAdd(categoria_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//COMBOS FK
		if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_cliente_control) {
		//FORMULARIO
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);	
		//COMBOS FK
		if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_funcion1.esPaginaForm()==true) {
			window.opener.categoria_cliente_webcontrol1.actualizarPaginaTablaDatos(categoria_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_cliente_control) {
		categoria_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_cliente_control.strAuxiliarUrlPagina);
				
		categoria_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_cliente_control.strAuxiliarTipo,categoria_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_cliente_control) {
		categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
			
		if(categoria_cliente_funcion1.esPaginaForm()==true) {
			window.opener.categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(categoria_cliente_control) {
		eval(categoria_cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(categoria_cliente_control, mostrar) {
		
		if(mostrar==true) {
			categoria_cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			categoria_cliente_funcion1.mostrarDivMensaje(true,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_cliente_funcion1.mostrarDivMensaje(false,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(categoria_cliente_control) {
	
		funcionGeneral.printWebPartPage("categoria_cliente",categoria_cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcategoria_clientesAjaxWebPart").html(categoria_cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("categoria_cliente",jQuery("#divTablaDatosReporteAuxiliarcategoria_clientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(categoria_cliente_control) {
		this.categoria_cliente_controlInicial=categoria_cliente_control;
			
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_cliente_control.strStyleDivArbol,categoria_cliente_control.strStyleDivContent
																,categoria_cliente_control.strStyleDivOpcionesBanner,categoria_cliente_control.strStyleDivExpandirColapsar
																,categoria_cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=categoria_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",categoria_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(categoria_cliente_control) {
		jQuery("#divTablaDatoscategoria_clientesAjaxWebPart").html(categoria_cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscategoria_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscategoria_clientes=jQuery("#tblTablaDatoscategoria_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("categoria_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',categoria_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			categoria_cliente_webcontrol1.registrarControlesTableEdition(categoria_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		categoria_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(categoria_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(categoria_cliente_control.categoria_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(categoria_cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(categoria_cliente_control) {
		this.actualizarCssBotonesPagina(categoria_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_cliente_control.tiposReportes,categoria_cliente_control.tiposReporte
															 	,categoria_cliente_control.tiposPaginacion,categoria_cliente_control.tiposAcciones
																,categoria_cliente_control.tiposColumnasSelect,categoria_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_cliente_control.tiposRelaciones,categoria_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(categoria_cliente_control) {
		jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trcategoria_clienteCabeceraBusquedas").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cliente").css("display",categoria_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(categoria_cliente_control.htmlTablaOrderBy!=null
			&& categoria_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//categoria_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(categoria_cliente_control.htmlTablaOrderByRel!=null
			&& categoria_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display","none");
			jQuery("#trcategoria_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacategoria_cliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(categoria_cliente_control) {
		jQuery("#tdcategoria_clienteNuevo").css("display",categoria_cliente_control.strPermisoNuevo);
		jQuery("#trcategoria_clienteElementos").css("display",categoria_cliente_control.strVisibleTablaElementos);
		jQuery("#trcategoria_clienteAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_clienteParametrosAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_cliente_control);
				
		if(categoria_cliente_control.categoria_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(categoria_cliente_control) {
	
		var indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(categoria_cliente_control) {
		jQuery("#divResumencategoria_clienteActualAjaxWebPart").html(categoria_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control) {
		jQuery("#divAccionesRelacionescategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaAccionesRelaciones);
			
		categoria_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(categoria_cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(categoria_cliente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncategoria_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("categoria_cliente",id,"cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_cliente_control) {
	
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-id").val(categoria_cliente_control.categoria_clienteActual.id);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-version_row").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-nombre").val(categoria_cliente_control.categoria_clienteActual.nombre);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_cliente_control.categoria_clienteActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_cliente","cuentascobrar","","form_categoria_cliente",formulario,"","",paraEventoTabla,idFilaTabla,categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	cargarCombosFK(categoria_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_cliente_control.strRecargarFkTiposNinguno!=null && categoria_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(categoria_cliente_control) {
		jQuery("#spanstrMensajeid").text(categoria_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(categoria_cliente_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_cliente_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_cliente_control) {
		jQuery("#tdbtnNuevocategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_cliente").css("display",categoria_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_cliente").css("display",categoria_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_cliente").css("display",categoria_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_cliente").css("display",categoria_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_cliente");

			categoria_cliente_webcontrol1.registrarSesionParaclientes(idActual);
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

	actualizarCamposFilaTabla(categoria_cliente_control) {
		var i=0;
		
		i=categoria_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(categoria_cliente_control.categoria_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(categoria_cliente_control.categoria_clienteActual.nombre);
		jQuery("#t-cel_"+i+"_3").prop('checked',categoria_cliente_control.categoria_clienteActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(categoria_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatoscategoria_clientes").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualcategoria_cliente");

			categoria_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_cliente","cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(categoria_cliente_control) {
		categoria_cliente_funcion1.registrarControlesTableValidacionEdition(categoria_cliente_control,categoria_cliente_webcontrol1,categoria_cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_clienteConstante,strParametros);
		
		//categoria_cliente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(categoria_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
			if(categoria_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,"categoria_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_cliente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			categoria_cliente_funcion1.validarFormularioJQuery(categoria_cliente_constante1);
			
			if(categoria_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_cliente_control) {
		
		jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trcategoria_clienteCabeceraBusquedas").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cliente").css("display",categoria_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecategoria_cliente").css("display",categoria_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscategoria_cliente").attr("style",categoria_cliente_control.strPermisoMostrarTodos);
		
		if(categoria_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdcategoria_clienteNuevo").css("display",categoria_cliente_control.strPermisoNuevo);
			jQuery("#tdcategoria_clienteNuevoToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcategoria_clienteDuplicar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_clienteDuplicarToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_clienteNuevoGuardarCambios").css("display",categoria_cliente_control.strPermisoNuevo);
			jQuery("#tdcategoria_clienteNuevoGuardarCambiosToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(categoria_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_clienteActualizarToolBar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_clienteCopiar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_clienteCopiarToolBar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_clienteConEditar").css("display",categoria_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdcategoria_clienteEliminarToolBar").css("display",categoria_cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcategoria_clienteGuardarCambios").css("display",categoria_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcategoria_clienteGuardarCambiosToolBar").css("display",categoria_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcategoria_clienteElementos").css("display",categoria_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_clienteAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_clienteParametrosAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tdcategoria_clienteCerrarPagina").css("display",categoria_cliente_control.strPermisoPopup);		
		jQuery("#tdcategoria_clienteCerrarPaginaToolBar").css("display",categoria_cliente_control.strPermisoPopup);
		//jQuery("#trcategoria_clienteAccionesRelaciones").css("display",categoria_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarEventosControles();
		
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			categoria_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(categoria_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				categoria_cliente_webcontrol1.onLoad();
				
			} else {
				if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(categoria_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
						//categoria_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(categoria_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_cliente_constante1.BIG_ID_ACTUAL,"categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
						//categoria_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			categoria_cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var categoria_cliente_webcontrol1=new categoria_cliente_webcontrol();

if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_cliente_webcontrol1.onLoadWindow; 
}

//</script>