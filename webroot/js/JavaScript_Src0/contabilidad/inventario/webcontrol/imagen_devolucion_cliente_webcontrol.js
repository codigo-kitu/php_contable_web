//<script type="text/javascript" language="javascript">



//var imagen_devolucion_clienteJQueryPaginaWebInteraccion= function (imagen_devolucion_cliente_control) {
//this.,this.,this.

class imagen_devolucion_cliente_webcontrol extends imagen_devolucion_cliente_webcontrol_add {
	
	imagen_devolucion_cliente_control=null;
	imagen_devolucion_cliente_controlInicial=null;
	imagen_devolucion_cliente_controlAuxiliar=null;
		
	//if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_devolucion_cliente_control) {
		super();
		
		this.imagen_devolucion_cliente_control=imagen_devolucion_cliente_control;
	}
		
	actualizarVariablesPagina(imagen_devolucion_cliente_control) {
		
		if(imagen_devolucion_cliente_control.action=="index" || imagen_devolucion_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_cliente_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_devolucion_cliente_control.action + " Revisar Manejo");
			
			if(imagen_devolucion_cliente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
				
				return;
			}
			
			//if(imagen_devolucion_cliente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_devolucion_cliente_control);
			//}
			
			if(imagen_devolucion_cliente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_cliente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, false);			
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control);	
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control);	
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
			}
			
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_devolucion_cliente_control);			
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_devolucion_cliente_control);
			}
			
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_devolucion_cliente_control);
			}				
			
			if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_devolucion_cliente_control);
			}
			
			if(imagen_devolucion_cliente_control.usuarioActual!=null && imagen_devolucion_cliente_control.usuarioActual.field_strUserName!=null &&
			imagen_devolucion_cliente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_devolucion_cliente_control);			
			}
		}
		
		
		if(imagen_devolucion_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_devolucion_cliente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_devolucion_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_cliente_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);				
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);
		this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_cliente_control) {
		this.actualizarPaginaImprimir(imagen_devolucion_cliente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_cliente_control) {
		this.actualizarPaginaImprimir(imagen_devolucion_cliente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_cliente_control) {
		//FORMULARIO
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
			this.actualizarPaginaFormularioAdd(imagen_devolucion_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//COMBOS FK
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_cliente_control) {
		//FORMULARIO
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);	
		//COMBOS FK
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);
		}
	}
	
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control) {
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_cliente_control) {
		if(imagen_devolucion_cliente_funcion1.esPaginaForm()==true) {
			window.opener.imagen_devolucion_cliente_webcontrol1.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_devolucion_cliente_control.strAuxiliarUrlPagina);
				
		imagen_devolucion_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_devolucion_cliente_control.strAuxiliarTipo,imagen_devolucion_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensajeAlert,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
			
		if(imagen_devolucion_cliente_funcion1.esPaginaForm()==true) {
			window.opener.imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensajeAlert,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_devolucion_cliente_control) {
		eval(imagen_devolucion_cliente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, mostrar) {
		
		if(mostrar==true) {
			imagen_devolucion_cliente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_devolucion_cliente_funcion1.mostrarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensaje,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_devolucion_cliente_funcion1.mostrarDivMensaje(false,imagen_devolucion_cliente_control.strAuxiliarMensaje,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_devolucion_cliente_control) {
	
		funcionGeneral.printWebPartPage("imagen_devolucion_cliente",imagen_devolucion_cliente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_devolucion_clientesAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_devolucion_cliente",jQuery("#divTablaDatosReporteAuxiliarimagen_devolucion_clientesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control) {
		this.imagen_devolucion_cliente_controlInicial=imagen_devolucion_cliente_control;
			
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_devolucion_cliente_control.strStyleDivArbol,imagen_devolucion_cliente_control.strStyleDivContent
																,imagen_devolucion_cliente_control.strStyleDivOpcionesBanner,imagen_devolucion_cliente_control.strStyleDivExpandirColapsar
																,imagen_devolucion_cliente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_devolucion_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_devolucion_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_devolucion_cliente_control) {
		jQuery("#divTablaDatosimagen_devolucion_clientesAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_devolucion_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_devolucion_clientes=jQuery("#tblTablaDatosimagen_devolucion_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_devolucion_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_devolucion_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_devolucion_cliente_webcontrol1.registrarControlesTableEdition(imagen_devolucion_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_devolucion_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_devolucion_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_devolucion_cliente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control) {
		this.actualizarCssBotonesPagina(imagen_devolucion_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_devolucion_cliente_control.tiposReportes,imagen_devolucion_cliente_control.tiposReporte
															 	,imagen_devolucion_cliente_control.tiposPaginacion,imagen_devolucion_cliente_control.tiposAcciones
																,imagen_devolucion_cliente_control.tiposColumnasSelect,imagen_devolucion_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_devolucion_cliente_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control) {
		jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_devolucion_cliente_control.htmlTablaOrderBy!=null
			&& imagen_devolucion_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_devolucion_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_devolucion_cliente_control.htmlTablaOrderByRel!=null
			&& imagen_devolucion_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display","none");
			jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_devolucion_cliente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control) {
		jQuery("#tdimagen_devolucion_clienteNuevo").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
		jQuery("#trimagen_devolucion_clienteElementos").css("display",imagen_devolucion_cliente_control.strVisibleTablaElementos);
		jQuery("#trimagen_devolucion_clienteAcciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucion_clienteParametrosAcciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_devolucion_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_devolucion_cliente_control);
				
		if(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_devolucion_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_devolucion_cliente_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_devolucion_cliente_control) {
	
		var indexPosition=imagen_devolucion_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_devolucion_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_devolucion_cliente_control) {
		jQuery("#divResumenimagen_devolucion_clienteActualAjaxWebPart").html(imagen_devolucion_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_devolucion_cliente_control) {
		jQuery("#divAccionesRelacionesimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaAccionesRelaciones);
			
		imagen_devolucion_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_devolucion_cliente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_devolucion_cliente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_devolucion_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_devolucion_cliente",id,"inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_devolucion_cliente_control) {
	
		jQuery("#form"+imagen_devolucion_cliente_constante1.STR_SUFIJO+"-id").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id);
		jQuery("#form"+imagen_devolucion_cliente_constante1.STR_SUFIJO+"-version_row").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.versionRow);
		jQuery("#form"+imagen_devolucion_cliente_constante1.STR_SUFIJO+"-id_imagen").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id_imagen);
		jQuery("#form"+imagen_devolucion_cliente_constante1.STR_SUFIJO+"-imagen").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.imagen);
		jQuery("#form"+imagen_devolucion_cliente_constante1.STR_SUFIJO+"-nro_devolucion").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.nro_devolucion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_devolucion_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_devolucion_cliente","inventario","","form_imagen_devolucion_cliente",formulario,"","",paraEventoTabla,idFilaTabla,imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
	}
	
	cargarCombosFK(imagen_devolucion_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!=null && imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(imagen_devolucion_cliente_control) {
		jQuery("#spanstrMensajeid").text(imagen_devolucion_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_devolucion_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_devolucion_cliente_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeimagen").text(imagen_devolucion_cliente_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_devolucion").text(imagen_devolucion_cliente_control.strMensajenro_devolucion);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_devolucion_cliente_control) {
		jQuery("#tdbtnNuevoimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_devolucion_cliente").css("visibility",imagen_devolucion_cliente_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(imagen_devolucion_cliente_control) {
		var i=0;
		
		i=imagen_devolucion_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id_imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.imagen);
		jQuery("#t-cel_"+i+"_4").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.nro_devolucion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_devolucion_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_funcion1.registrarControlesTableValidacionEdition(imagen_devolucion_cliente_control,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_clienteConstante,strParametros);
		
		//imagen_devolucion_cliente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_devolucion_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_devolucion_cliente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_devolucion_cliente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_devolucion_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
			
			if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,"imagen_devolucion_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_devolucion_cliente_funcion1.validarFormularioJQuery(imagen_devolucion_cliente_constante1);
			
			if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_devolucion_cliente_control) {
		
		jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_devolucion_cliente").attr("style",imagen_devolucion_cliente_control.strPermisoMostrarTodos);
		
		if(imagen_devolucion_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_devolucion_clienteNuevo").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucion_clienteNuevoToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_devolucion_clienteDuplicar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteDuplicarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteNuevoGuardarCambios").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucion_clienteNuevoGuardarCambiosToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_devolucion_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_devolucion_clienteActualizarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteCopiar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteCopiarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteConEditar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_devolucion_clienteEliminarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_devolucion_clienteGuardarCambios").css("display",imagen_devolucion_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_devolucion_clienteGuardarCambiosToolBar").css("display",imagen_devolucion_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_devolucion_clienteElementos").css("display",imagen_devolucion_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_devolucion_clienteAcciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucion_clienteParametrosAcciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_devolucion_clienteCerrarPagina").css("display",imagen_devolucion_cliente_control.strPermisoPopup);		
		jQuery("#tdimagen_devolucion_clienteCerrarPaginaToolBar").css("display",imagen_devolucion_cliente_control.strPermisoPopup);
		//jQuery("#trimagen_devolucion_clienteAccionesRelaciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_cliente_webcontrol1.registrarEventosControles();
		
		if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			imagen_devolucion_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_devolucion_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_devolucion_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_devolucion_cliente_webcontrol1.onLoad();
				
			} else {
				if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_devolucion_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
						//imagen_devolucion_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_devolucion_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_devolucion_cliente_constante1.BIG_ID_ACTUAL,"imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
						//imagen_devolucion_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_devolucion_cliente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_devolucion_cliente_webcontrol1=new imagen_devolucion_cliente_webcontrol();

if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_devolucion_cliente_webcontrol1.onLoadWindow; 
}

//</script>