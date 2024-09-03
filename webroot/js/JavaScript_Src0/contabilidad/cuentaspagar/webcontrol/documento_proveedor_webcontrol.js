//<script type="text/javascript" language="javascript">



//var documento_proveedorJQueryPaginaWebInteraccion= function (documento_proveedor_control) {
//this.,this.,this.

class documento_proveedor_webcontrol extends documento_proveedor_webcontrol_add {
	
	documento_proveedor_control=null;
	documento_proveedor_controlInicial=null;
	documento_proveedor_controlAuxiliar=null;
		
	//if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_proveedor_control) {
		super();
		
		this.documento_proveedor_control=documento_proveedor_control;
	}
		
	actualizarVariablesPagina(documento_proveedor_control) {
		
		if(documento_proveedor_control.action=="index" || documento_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control);		
		}
		else if(documento_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control);		
		}
		else if(documento_proveedor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_proveedor_control);		
		}
		else if(documento_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(documento_proveedor_control.action + " Revisar Manejo");
			
			if(documento_proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(documento_proveedor_control);
				
				return;
			}
			
			//if(documento_proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(documento_proveedor_control);
			//}
			
			if(documento_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(documento_proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(documento_proveedor_control, false);			
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(documento_proveedor_control);	
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(documento_proveedor_control);	
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(documento_proveedor_control);
			}
			
			
			if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(documento_proveedor_control);			
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(documento_proveedor_control);
			}
			
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(documento_proveedor_control);
			}				
			
			if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control);
			}
			
			if(documento_proveedor_control.usuarioActual!=null && documento_proveedor_control.usuarioActual.field_strUserName!=null &&
			documento_proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(documento_proveedor_control);			
			}
		}
		
		
		if(documento_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(documento_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(documento_proveedor_control);
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
		this.actualizarPaginaAreaBusquedas(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(documento_proveedor_control);
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
		this.actualizarPaginaAreaBusquedas(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_proveedor_control) {
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_proveedor_control) {
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);				
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_proveedor_control) {
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_proveedor_control) {
		this.actualizarPaginaImprimir(documento_proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_proveedor_control) {
		this.actualizarPaginaImprimir(documento_proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);
			this.actualizarPaginaFormularioAdd(documento_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);	
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);	
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.documento_proveedor_webcontrol1.actualizarPaginaTablaDatos(documento_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_proveedor_control) {
		documento_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_proveedor_control.strAuxiliarUrlPagina);
				
		documento_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_proveedor_control.strAuxiliarTipo,documento_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_proveedor_control) {
		documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
			
		if(documento_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(documento_proveedor_control) {
		eval(documento_proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(documento_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			documento_proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			documento_proveedor_funcion1.mostrarDivMensaje(true,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			documento_proveedor_funcion1.mostrarDivMensaje(false,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(documento_proveedor_control) {
	
		funcionGeneral.printWebPartPage("documento_proveedor",documento_proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardocumento_proveedorsAjaxWebPart").html(documento_proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("documento_proveedor",jQuery("#divTablaDatosReporteAuxiliardocumento_proveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(documento_proveedor_control) {
		this.documento_proveedor_controlInicial=documento_proveedor_control;
			
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_proveedor_control.strStyleDivArbol,documento_proveedor_control.strStyleDivContent
																,documento_proveedor_control.strStyleDivOpcionesBanner,documento_proveedor_control.strStyleDivExpandirColapsar
																,documento_proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(documento_proveedor_control) {
		jQuery("#divTablaDatosdocumento_proveedorsAjaxWebPart").html(documento_proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_proveedors=jQuery("#tblTablaDatosdocumento_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_proveedor_webcontrol1.registrarControlesTableEdition(documento_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(documento_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_proveedor_control.documento_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(documento_proveedor_control) {
		this.actualizarCssBotonesPagina(documento_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_proveedor_control.tiposReportes,documento_proveedor_control.tiposReporte
															 	,documento_proveedor_control.tiposPaginacion,documento_proveedor_control.tiposAcciones
																,documento_proveedor_control.tiposColumnasSelect,documento_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_proveedor_control.tiposRelaciones,documento_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(documento_proveedor_control) {
		jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_proveedor").css("display",documento_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_proveedor_control.htmlTablaOrderBy!=null
			&& documento_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_proveedor_control.htmlTablaOrderByRel!=null
			&& documento_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display","none");
			jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_proveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(documento_proveedor_control) {
		jQuery("#tddocumento_proveedorNuevo").css("display",documento_proveedor_control.strPermisoNuevo);
		jQuery("#trdocumento_proveedorElementos").css("display",documento_proveedor_control.strVisibleTablaElementos);
		jQuery("#trdocumento_proveedorAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_proveedorParametrosAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_proveedor_control);
				
		if(documento_proveedor_control.documento_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(documento_proveedor_control) {
	
		var indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_proveedor_control) {
		jQuery("#divResumendocumento_proveedorActualAjaxWebPart").html(documento_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control) {
		jQuery("#divAccionesRelacionesdocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaAccionesRelaciones);
			
		documento_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_proveedor_control) {
		
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_proveedor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_proveedor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_proveedor",id,"cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		documento_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_proveedor","proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_proveedor_control) {
	
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id").val(documento_proveedor_control.documento_proveedorActual.id);
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-version_row").val(documento_proveedor_control.documento_proveedorActual.versionRow);
		
		if(documento_proveedor_control.documento_proveedorActual.id_proveedor!=null && documento_proveedor_control.documento_proveedorActual.id_proveedor>-1){
			if(jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_proveedor_control.documento_proveedorActual.id_proveedor) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(documento_proveedor_control.documento_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-documento").val(documento_proveedor_control.documento_proveedorActual.documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_proveedor","cuentaspagar","","form_documento_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	cargarCombosFK(documento_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_proveedor_control.strRecargarFkTiposNinguno!=null && documento_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(documento_proveedor_control) {
		jQuery("#spanstrMensajeid").text(documento_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(documento_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_proveedor").text(documento_proveedor_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajedocumento").text(documento_proveedor_control.strMensajedocumento);		
	}
	
	actualizarCssBotonesMantenimiento(documento_proveedor_control) {
		jQuery("#tdbtnNuevodocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_proveedor").css("display",documento_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_proveedor").css("display",documento_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_proveedor").css("display",documento_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_proveedor").css("display",documento_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondocumento_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_proveedor");

			documento_proveedor_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(documento_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_proveedor_funcion1,documento_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(documento_proveedor_control) {
		var i=0;
		
		i=documento_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_proveedor_control.documento_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_proveedor_control.documento_proveedorActual.versionRow);
		
		if(documento_proveedor_control.documento_proveedorActual.id_proveedor!=null && documento_proveedor_control.documento_proveedorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_proveedor_control.documento_proveedorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(documento_proveedor_control.documento_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(documento_proveedor_control.documento_proveedorActual.documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cliente").click(function(){
		jQuery("#tblTablaDatosdocumento_proveedors").on("click",".imgrelaciondocumento_cliente", function () {

			var idActual=jQuery(this).attr("idactualdocumento_proveedor");

			documento_proveedor_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});				
	}
		
	

	registrarSesionParadocumento_clientees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_proveedor","documento_cliente","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(documento_proveedor_control) {
		documento_proveedor_funcion1.registrarControlesTableValidacionEdition(documento_proveedor_control,documento_proveedor_webcontrol1,documento_proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedorConstante,strParametros);
		
		//documento_proveedor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproveedorsFK(documento_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor",documento_proveedor_control.proveedorsFK);

		if(documento_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_proveedor_control.idFilaTablaActual+"_2",documento_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",documento_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(documento_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(documento_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(documento_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(documento_proveedor_control);
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
	onLoadCombosEventosFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
			if(documento_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,"documento_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				documento_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_proveedor","FK_Idproveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_proveedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			documento_proveedor_funcion1.validarFormularioJQuery(documento_proveedor_constante1);
			
			if(documento_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_proveedor_control) {
		
		jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_proveedor").css("display",documento_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_proveedor").css("display",documento_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_proveedor").attr("style",documento_proveedor_control.strPermisoMostrarTodos);
		
		if(documento_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_proveedorNuevo").css("display",documento_proveedor_control.strPermisoNuevo);
			jQuery("#tddocumento_proveedorNuevoToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_proveedorDuplicar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_proveedorDuplicarToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_proveedorNuevoGuardarCambios").css("display",documento_proveedor_control.strPermisoNuevo);
			jQuery("#tddocumento_proveedorNuevoGuardarCambiosToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_proveedorActualizarToolBar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_proveedorCopiar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_proveedorCopiarToolBar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_proveedorConEditar").css("display",documento_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_proveedorEliminarToolBar").css("display",documento_proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddocumento_proveedorGuardarCambios").css("display",documento_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_proveedorGuardarCambiosToolBar").css("display",documento_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdocumento_proveedorElementos").css("display",documento_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_proveedorAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_proveedorParametrosAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tddocumento_proveedorCerrarPagina").css("display",documento_proveedor_control.strPermisoPopup);		
		jQuery("#tddocumento_proveedorCerrarPaginaToolBar").css("display",documento_proveedor_control.strPermisoPopup);
		//jQuery("#trdocumento_proveedorAccionesRelaciones").css("display",documento_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarEventosControles();
		
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			documento_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(documento_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_proveedor_webcontrol1.onLoad();
				
			} else {
				if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(documento_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
						//documento_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(documento_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_proveedor_constante1.BIG_ID_ACTUAL,"documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
						//documento_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			documento_proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var documento_proveedor_webcontrol1=new documento_proveedor_webcontrol();

if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_proveedor_webcontrol1.onLoadWindow; 
}

//</script>