//<script type="text/javascript" language="javascript">



//var giro_negocio_proveedorJQueryPaginaWebInteraccion= function (giro_negocio_proveedor_control) {
//this.,this.,this.

class giro_negocio_proveedor_webcontrol extends giro_negocio_proveedor_webcontrol_add {
	
	giro_negocio_proveedor_control=null;
	giro_negocio_proveedor_controlInicial=null;
	giro_negocio_proveedor_controlAuxiliar=null;
		
	//if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(giro_negocio_proveedor_control) {
		super();
		
		this.giro_negocio_proveedor_control=giro_negocio_proveedor_control;
	}
		
	actualizarVariablesPagina(giro_negocio_proveedor_control) {
		
		if(giro_negocio_proveedor_control.action=="index" || giro_negocio_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control);		
		}
		else if(giro_negocio_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control);		
		}
		else if(giro_negocio_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(giro_negocio_proveedor_control.action + " Revisar Manejo");
			
			if(giro_negocio_proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
				
				return;
			}
			
			//if(giro_negocio_proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(giro_negocio_proveedor_control);
			//}
			
			if(giro_negocio_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && giro_negocio_proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, false);			
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);	
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);	
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
			}
			
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(giro_negocio_proveedor_control);			
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(giro_negocio_proveedor_control);
			}
			
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(giro_negocio_proveedor_control);
			}				
			
			if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control);
			}
			
			if(giro_negocio_proveedor_control.usuarioActual!=null && giro_negocio_proveedor_control.usuarioActual.field_strUserName!=null &&
			giro_negocio_proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(giro_negocio_proveedor_control);			
			}
		}
		
		
		if(giro_negocio_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(giro_negocio_proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(giro_negocio_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control) {
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(giro_negocio_proveedor_control) {
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);				
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(giro_negocio_proveedor_control) {
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(giro_negocio_proveedor_control) {
		this.actualizarPaginaImprimir(giro_negocio_proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(giro_negocio_proveedor_control) {
		this.actualizarPaginaImprimir(giro_negocio_proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_proveedor_control) {
		//FORMULARIO
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
			this.actualizarPaginaFormularioAdd(giro_negocio_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//COMBOS FK
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(giro_negocio_proveedor_control) {
		//FORMULARIO
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);	
		//COMBOS FK
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && giro_negocio_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.giro_negocio_proveedor_webcontrol1.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(giro_negocio_proveedor_control.strAuxiliarUrlPagina);
				
		giro_negocio_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(giro_negocio_proveedor_control.strAuxiliarTipo,giro_negocio_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
			
		if(giro_negocio_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(giro_negocio_proveedor_control) {
		eval(giro_negocio_proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			giro_negocio_proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				giro_negocio_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(false,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(giro_negocio_proveedor_control) {
	
		funcionGeneral.printWebPartPage("giro_negocio_proveedor",giro_negocio_proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliargiro_negocio_proveedorsAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("giro_negocio_proveedor",jQuery("#divTablaDatosReporteAuxiliargiro_negocio_proveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(giro_negocio_proveedor_control) {
		this.giro_negocio_proveedor_controlInicial=giro_negocio_proveedor_control;
			
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(giro_negocio_proveedor_control.strStyleDivArbol,giro_negocio_proveedor_control.strStyleDivContent
																,giro_negocio_proveedor_control.strStyleDivOpcionesBanner,giro_negocio_proveedor_control.strStyleDivExpandirColapsar
																,giro_negocio_proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=giro_negocio_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",giro_negocio_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(giro_negocio_proveedor_control) {
		jQuery("#divTablaDatosgiro_negocio_proveedorsAjaxWebPart").html(giro_negocio_proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosgiro_negocio_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosgiro_negocio_proveedors=jQuery("#tblTablaDatosgiro_negocio_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("giro_negocio_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',giro_negocio_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			giro_negocio_proveedor_webcontrol1.registrarControlesTableEdition(giro_negocio_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		giro_negocio_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(giro_negocio_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(giro_negocio_proveedor_control.giro_negocio_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(giro_negocio_proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control) {
		this.actualizarCssBotonesPagina(giro_negocio_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(giro_negocio_proveedor_control.tiposReportes,giro_negocio_proveedor_control.tiposReporte
															 	,giro_negocio_proveedor_control.tiposPaginacion,giro_negocio_proveedor_control.tiposAcciones
																,giro_negocio_proveedor_control.tiposColumnasSelect,giro_negocio_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(giro_negocio_proveedor_control.tiposRelaciones,giro_negocio_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(giro_negocio_proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control) {
		jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedagiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(giro_negocio_proveedor_control.htmlTablaOrderBy!=null
			&& giro_negocio_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBygiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//giro_negocio_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(giro_negocio_proveedor_control.htmlTablaOrderByRel!=null
			&& giro_negocio_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelgiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display","none");
			jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedagiro_negocio_proveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control) {
		jQuery("#tdgiro_negocio_proveedorNuevo").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
		jQuery("#trgiro_negocio_proveedorElementos").css("display",giro_negocio_proveedor_control.strVisibleTablaElementos);
		jQuery("#trgiro_negocio_proveedorAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_proveedorParametrosAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(giro_negocio_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(giro_negocio_proveedor_control);
				
		if(giro_negocio_proveedor_control.giro_negocio_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(giro_negocio_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(giro_negocio_proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(giro_negocio_proveedor_control) {
	
		var indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(giro_negocio_proveedor_control) {
		jQuery("#divResumengiro_negocio_proveedorActualAjaxWebPart").html(giro_negocio_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control) {
		jQuery("#divAccionesRelacionesgiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaAccionesRelaciones);
			
		giro_negocio_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(giro_negocio_proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(giro_negocio_proveedor_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciongiro_negocio_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("giro_negocio_proveedor",id,"cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(giro_negocio_proveedor_control) {
	
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-id").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.id);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-version_row").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.versionRow);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-nombre").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.nombre);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-predeterminado").prop('checked',giro_negocio_proveedor_control.giro_negocio_proveedorActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+giro_negocio_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("giro_negocio_proveedor","cuentaspagar","","form_giro_negocio_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	cargarCombosFK(giro_negocio_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(giro_negocio_proveedor_control.strRecargarFkTiposNinguno!=null && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(giro_negocio_proveedor_control) {
		jQuery("#spanstrMensajeid").text(giro_negocio_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(giro_negocio_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(giro_negocio_proveedor_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(giro_negocio_proveedor_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(giro_negocio_proveedor_control) {
		jQuery("#tdbtnNuevogiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevogiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizargiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminargiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosgiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosgiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualgiro_negocio_proveedor");

			giro_negocio_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
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

	actualizarCamposFilaTabla(giro_negocio_proveedor_control) {
		var i=0;
		
		i=giro_negocio_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.nombre);
		jQuery("#t-cel_"+i+"_3").prop('checked',giro_negocio_proveedor_control.giro_negocio_proveedorActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(giro_negocio_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosgiro_negocio_proveedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualgiro_negocio_proveedor");

			giro_negocio_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"giro_negocio_proveedor","proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_funcion1.registrarControlesTableValidacionEdition(giro_negocio_proveedor_control,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedorConstante,strParametros);
		
		//giro_negocio_proveedor_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//giro_negocio_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("giro_negocio_proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("giro_negocio_proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(giro_negocio_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
			if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,"giro_negocio_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("giro_negocio_proveedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			giro_negocio_proveedor_funcion1.validarFormularioJQuery(giro_negocio_proveedor_constante1);
			
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(giro_negocio_proveedor_control) {
		
		jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedagiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportegiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosgiro_negocio_proveedor").attr("style",giro_negocio_proveedor_control.strPermisoMostrarTodos);
		
		if(giro_negocio_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdgiro_negocio_proveedorNuevo").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
			jQuery("#tdgiro_negocio_proveedorNuevoToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdgiro_negocio_proveedorDuplicar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorDuplicarToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorNuevoGuardarCambios").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
			jQuery("#tdgiro_negocio_proveedorNuevoGuardarCambiosToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(giro_negocio_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdgiro_negocio_proveedorActualizarToolBar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorCopiar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorCopiarToolBar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorConEditar").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdgiro_negocio_proveedorEliminarToolBar").css("display",giro_negocio_proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdgiro_negocio_proveedorGuardarCambios").css("display",giro_negocio_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdgiro_negocio_proveedorGuardarCambiosToolBar").css("display",giro_negocio_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trgiro_negocio_proveedorElementos").css("display",giro_negocio_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trgiro_negocio_proveedorAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_proveedorParametrosAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdgiro_negocio_proveedorCerrarPagina").css("display",giro_negocio_proveedor_control.strPermisoPopup);		
		jQuery("#tdgiro_negocio_proveedorCerrarPaginaToolBar").css("display",giro_negocio_proveedor_control.strPermisoPopup);
		//jQuery("#trgiro_negocio_proveedorAccionesRelaciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarEventosControles();
		
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			giro_negocio_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(giro_negocio_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				giro_negocio_proveedor_webcontrol1.onLoad();
				
			} else {
				if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(giro_negocio_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
						//giro_negocio_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(giro_negocio_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(giro_negocio_proveedor_constante1.BIG_ID_ACTUAL,"giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
						//giro_negocio_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			giro_negocio_proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var giro_negocio_proveedor_webcontrol1=new giro_negocio_proveedor_webcontrol();

if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = giro_negocio_proveedor_webcontrol1.onLoadWindow; 
}

//</script>