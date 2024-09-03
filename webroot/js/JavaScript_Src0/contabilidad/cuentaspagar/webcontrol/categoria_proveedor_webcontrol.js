//<script type="text/javascript" language="javascript">



//var categoria_proveedorJQueryPaginaWebInteraccion= function (categoria_proveedor_control) {
//this.,this.,this.

class categoria_proveedor_webcontrol extends categoria_proveedor_webcontrol_add {
	
	categoria_proveedor_control=null;
	categoria_proveedor_controlInicial=null;
	categoria_proveedor_controlAuxiliar=null;
		
	//if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_proveedor_control) {
		super();
		
		this.categoria_proveedor_control=categoria_proveedor_control;
	}
		
	actualizarVariablesPagina(categoria_proveedor_control) {
		
		if(categoria_proveedor_control.action=="index" || categoria_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_proveedor_control);
			
		} else if(categoria_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(categoria_proveedor_control);
			
		} else if(categoria_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(categoria_proveedor_control);
			
		} else if(categoria_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_proveedor_control);		
		
		} else if(categoria_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_proveedor_control);		
		
		} else if(categoria_proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_proveedor_control);		
		
		} else if(categoria_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_proveedor_control);		
		}
		else if(categoria_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_proveedor_control);		
		}
		else if(categoria_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_proveedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(categoria_proveedor_control.action + " Revisar Manejo");
			
			if(categoria_proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(categoria_proveedor_control);
				
				return;
			}
			
			//if(categoria_proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(categoria_proveedor_control);
			//}
			
			if(categoria_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(categoria_proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(categoria_proveedor_control, false);			
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(categoria_proveedor_control);	
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(categoria_proveedor_control);	
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(categoria_proveedor_control);
			}
			
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(categoria_proveedor_control);			
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(categoria_proveedor_control);
			}
			
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(categoria_proveedor_control);
			}				
			
			if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_proveedor_control);
			}
			
			if(categoria_proveedor_control.usuarioActual!=null && categoria_proveedor_control.usuarioActual.field_strUserName!=null &&
			categoria_proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(categoria_proveedor_control);			
			}
		}
		
		
		if(categoria_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(categoria_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_proveedor_control);
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_proveedor_control);
		this.actualizarPaginaAreaBusquedas(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_proveedor_control);
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_proveedor_control);
		this.actualizarPaginaAreaBusquedas(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_proveedor_control) {
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(categoria_proveedor_control) {
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaAbrirLink(categoria_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);				
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(categoria_proveedor_control) {
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.onLoadCombosDefectoFK(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.onLoadCombosDefectoFK(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.onLoadCombosDefectoFK(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaAbrirLink(categoria_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_proveedor_control) {
		this.actualizarPaginaImprimir(categoria_proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_proveedor_control) {
		this.actualizarPaginaImprimir(categoria_proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_proveedor_control) {
		//FORMULARIO
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_proveedor_control);
			this.actualizarPaginaFormularioAdd(categoria_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		//COMBOS FK
		if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_proveedor_control) {
		//FORMULARIO
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);	
		//COMBOS FK
		if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_proveedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control) {
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control) {
		if(categoria_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.categoria_proveedor_webcontrol1.actualizarPaginaTablaDatos(categoria_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_proveedor_control) {
		categoria_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_proveedor_control.strAuxiliarUrlPagina);
				
		categoria_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_proveedor_control.strAuxiliarTipo,categoria_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_proveedor_control) {
		categoria_proveedor_funcion1.resaltarRestaurarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensajeAlert,categoria_proveedor_control.strAuxiliarCssMensaje);
			
		if(categoria_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.categoria_proveedor_funcion1.resaltarRestaurarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensajeAlert,categoria_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(categoria_proveedor_control) {
		eval(categoria_proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(categoria_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			categoria_proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			categoria_proveedor_funcion1.mostrarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensaje,categoria_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_proveedor_funcion1.mostrarDivMensaje(false,categoria_proveedor_control.strAuxiliarMensaje,categoria_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(categoria_proveedor_control) {
	
		funcionGeneral.printWebPartPage("categoria_proveedor",categoria_proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcategoria_proveedorsAjaxWebPart").html(categoria_proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("categoria_proveedor",jQuery("#divTablaDatosReporteAuxiliarcategoria_proveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(categoria_proveedor_control) {
		this.categoria_proveedor_controlInicial=categoria_proveedor_control;
			
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_proveedor_control.strStyleDivArbol,categoria_proveedor_control.strStyleDivContent
																,categoria_proveedor_control.strStyleDivOpcionesBanner,categoria_proveedor_control.strStyleDivExpandirColapsar
																,categoria_proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=categoria_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",categoria_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(categoria_proveedor_control) {
		jQuery("#divTablaDatoscategoria_proveedorsAjaxWebPart").html(categoria_proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscategoria_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscategoria_proveedors=jQuery("#tblTablaDatoscategoria_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("categoria_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',categoria_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			categoria_proveedor_webcontrol1.registrarControlesTableEdition(categoria_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		categoria_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(categoria_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(categoria_proveedor_control.categoria_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(categoria_proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(categoria_proveedor_control) {
		this.actualizarCssBotonesPagina(categoria_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_proveedor_control.tiposReportes,categoria_proveedor_control.tiposReporte
															 	,categoria_proveedor_control.tiposPaginacion,categoria_proveedor_control.tiposAcciones
																,categoria_proveedor_control.tiposColumnasSelect,categoria_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_proveedor_control.tiposRelaciones,categoria_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(categoria_proveedor_control) {
		jQuery("#divBusquedacategoria_proveedorAjaxWebPart").css("display",categoria_proveedor_control.strPermisoBusqueda);
		jQuery("#trcategoria_proveedorCabeceraBusquedas").css("display",categoria_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_proveedor").css("display",categoria_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(categoria_proveedor_control.htmlTablaOrderBy!=null
			&& categoria_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycategoria_proveedorAjaxWebPart").html(categoria_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//categoria_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(categoria_proveedor_control.htmlTablaOrderByRel!=null
			&& categoria_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcategoria_proveedorAjaxWebPart").html(categoria_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacategoria_proveedorAjaxWebPart").css("display","none");
			jQuery("#trcategoria_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacategoria_proveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(categoria_proveedor_control) {
		jQuery("#tdcategoria_proveedorNuevo").css("display",categoria_proveedor_control.strPermisoNuevo);
		jQuery("#trcategoria_proveedorElementos").css("display",categoria_proveedor_control.strVisibleTablaElementos);
		jQuery("#trcategoria_proveedorAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_proveedorParametrosAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_proveedor_control);
				
		if(categoria_proveedor_control.categoria_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(categoria_proveedor_control) {
	
		var indexPosition=categoria_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(categoria_proveedor_control) {
		jQuery("#divResumencategoria_proveedorActualAjaxWebPart").html(categoria_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_proveedor_control) {
		jQuery("#divAccionesRelacionescategoria_proveedorAjaxWebPart").html(categoria_proveedor_control.htmlTablaAccionesRelaciones);
			
		categoria_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(categoria_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(categoria_proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(categoria_proveedor_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncategoria_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("categoria_proveedor",id,"cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_proveedor_control) {
	
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-id").val(categoria_proveedor_control.categoria_proveedorActual.id);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-version_row").val(categoria_proveedor_control.categoria_proveedorActual.versionRow);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-nombre").val(categoria_proveedor_control.categoria_proveedorActual.nombre);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-predeterminado").val(categoria_proveedor_control.categoria_proveedorActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_proveedor","cuentaspagar","","form_categoria_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
	}
	
	cargarCombosFK(categoria_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_proveedor_control.strRecargarFkTiposNinguno!=null && categoria_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_proveedor_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(categoria_proveedor_control) {
		jQuery("#spanstrMensajeid").text(categoria_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(categoria_proveedor_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_proveedor_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_proveedor_control) {
		jQuery("#tdbtnNuevocategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_proveedor").css("display",categoria_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_proveedor").css("display",categoria_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_proveedor").css("display",categoria_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_proveedor").css("display",categoria_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_proveedor");

			categoria_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
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

	actualizarCamposFilaTabla(categoria_proveedor_control) {
		var i=0;
		
		i=categoria_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(categoria_proveedor_control.categoria_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(categoria_proveedor_control.categoria_proveedorActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(categoria_proveedor_control.categoria_proveedorActual.nombre);
		jQuery("#t-cel_"+i+"_3").val(categoria_proveedor_control.categoria_proveedorActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(categoria_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatoscategoria_proveedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualcategoria_proveedor");

			categoria_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_proveedor","proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(categoria_proveedor_control) {
		categoria_proveedor_funcion1.registrarControlesTableValidacionEdition(categoria_proveedor_control,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedorConstante,strParametros);
		
		//categoria_proveedor_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(categoria_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);			
			
			if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,"categoria_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_proveedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			categoria_proveedor_funcion1.validarFormularioJQuery(categoria_proveedor_constante1);
			
			if(categoria_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_proveedor_control) {
		
		jQuery("#divBusquedacategoria_proveedorAjaxWebPart").css("display",categoria_proveedor_control.strPermisoBusqueda);
		jQuery("#trcategoria_proveedorCabeceraBusquedas").css("display",categoria_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_proveedor").css("display",categoria_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecategoria_proveedor").css("display",categoria_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscategoria_proveedor").attr("style",categoria_proveedor_control.strPermisoMostrarTodos);
		
		if(categoria_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdcategoria_proveedorNuevo").css("display",categoria_proveedor_control.strPermisoNuevo);
			jQuery("#tdcategoria_proveedorNuevoToolBar").css("display",categoria_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcategoria_proveedorDuplicar").css("display",categoria_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_proveedorDuplicarToolBar").css("display",categoria_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_proveedorNuevoGuardarCambios").css("display",categoria_proveedor_control.strPermisoNuevo);
			jQuery("#tdcategoria_proveedorNuevoGuardarCambiosToolBar").css("display",categoria_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(categoria_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_proveedorActualizarToolBar").css("display",categoria_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_proveedorCopiar").css("display",categoria_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_proveedorCopiarToolBar").css("display",categoria_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_proveedorConEditar").css("display",categoria_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdcategoria_proveedorEliminarToolBar").css("display",categoria_proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcategoria_proveedorGuardarCambios").css("display",categoria_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcategoria_proveedorGuardarCambiosToolBar").css("display",categoria_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcategoria_proveedorElementos").css("display",categoria_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_proveedorAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_proveedorParametrosAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdcategoria_proveedorCerrarPagina").css("display",categoria_proveedor_control.strPermisoPopup);		
		jQuery("#tdcategoria_proveedorCerrarPaginaToolBar").css("display",categoria_proveedor_control.strPermisoPopup);
		//jQuery("#trcategoria_proveedorAccionesRelaciones").css("display",categoria_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_proveedor_webcontrol1.registrarEventosControles();
		
		if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			categoria_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(categoria_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				categoria_proveedor_webcontrol1.onLoad();
				
			} else {
				if(categoria_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(categoria_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
						//categoria_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(categoria_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_proveedor_constante1.BIG_ID_ACTUAL,"categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
						//categoria_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			categoria_proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var categoria_proveedor_webcontrol1=new categoria_proveedor_webcontrol();

if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_proveedor_webcontrol1.onLoadWindow; 
}

//</script>