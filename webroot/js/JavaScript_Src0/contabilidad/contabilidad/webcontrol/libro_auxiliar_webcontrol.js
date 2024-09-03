//<script type="text/javascript" language="javascript">



//var libro_auxiliarJQueryPaginaWebInteraccion= function (libro_auxiliar_control) {
//this.,this.,this.

class libro_auxiliar_webcontrol extends libro_auxiliar_webcontrol_add {
	
	libro_auxiliar_control=null;
	libro_auxiliar_controlInicial=null;
	libro_auxiliar_controlAuxiliar=null;
		
	//if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(libro_auxiliar_control) {
		super();
		
		this.libro_auxiliar_control=libro_auxiliar_control;
	}
		
	actualizarVariablesPagina(libro_auxiliar_control) {
		
		if(libro_auxiliar_control.action=="index" || libro_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control);		
		}
		else if(libro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control);		
		}
		else if(libro_auxiliar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(libro_auxiliar_control);		
		}
		else if(libro_auxiliar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(libro_auxiliar_control.action + " Revisar Manejo");
			
			if(libro_auxiliar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(libro_auxiliar_control);
				
				return;
			}
			
			//if(libro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(libro_auxiliar_control);
			//}
			
			if(libro_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && libro_auxiliar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(libro_auxiliar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(libro_auxiliar_control, false);			
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(libro_auxiliar_control);	
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);	
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(libro_auxiliar_control);
			}
			
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(libro_auxiliar_control);			
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(libro_auxiliar_control);
			}
			
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(libro_auxiliar_control);
			}				
			
			if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control);
			}
			
			if(libro_auxiliar_control.usuarioActual!=null && libro_auxiliar_control.usuarioActual.field_strUserName!=null &&
			libro_auxiliar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(libro_auxiliar_control);			
			}
		}
		
		
		if(libro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(libro_auxiliar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(libro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(libro_auxiliar_control);
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(libro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(libro_auxiliar_control);
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control) {
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(libro_auxiliar_control) {
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);				
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(libro_auxiliar_control) {
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(libro_auxiliar_control) {
		this.actualizarPaginaImprimir(libro_auxiliar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(libro_auxiliar_control) {
		this.actualizarPaginaImprimir(libro_auxiliar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);
			this.actualizarPaginaFormularioAdd(libro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);	
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(libro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);	
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && libro_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.libro_auxiliar_webcontrol1.actualizarPaginaTablaDatos(libro_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(libro_auxiliar_control) {
		libro_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(libro_auxiliar_control.strAuxiliarUrlPagina);
				
		libro_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(libro_auxiliar_control.strAuxiliarTipo,libro_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(libro_auxiliar_control) {
		libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
			
		if(libro_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(libro_auxiliar_control) {
		eval(libro_auxiliar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(libro_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			libro_auxiliar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				libro_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			libro_auxiliar_funcion1.mostrarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			libro_auxiliar_funcion1.mostrarDivMensaje(false,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(libro_auxiliar_control) {
	
		funcionGeneral.printWebPartPage("libro_auxiliar",libro_auxiliar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarlibro_auxiliarsAjaxWebPart").html(libro_auxiliar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("libro_auxiliar",jQuery("#divTablaDatosReporteAuxiliarlibro_auxiliarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(libro_auxiliar_control) {
		this.libro_auxiliar_controlInicial=libro_auxiliar_control;
			
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(libro_auxiliar_control.strStyleDivArbol,libro_auxiliar_control.strStyleDivContent
																,libro_auxiliar_control.strStyleDivOpcionesBanner,libro_auxiliar_control.strStyleDivExpandirColapsar
																,libro_auxiliar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=libro_auxiliar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",libro_auxiliar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(libro_auxiliar_control) {
		jQuery("#divTablaDatoslibro_auxiliarsAjaxWebPart").html(libro_auxiliar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslibro_auxiliars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslibro_auxiliars=jQuery("#tblTablaDatoslibro_auxiliars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("libro_auxiliar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',libro_auxiliar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			libro_auxiliar_webcontrol1.registrarControlesTableEdition(libro_auxiliar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		libro_auxiliar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(libro_auxiliar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(libro_auxiliar_control.libro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(libro_auxiliar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(libro_auxiliar_control) {
		this.actualizarCssBotonesPagina(libro_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(libro_auxiliar_control.tiposReportes,libro_auxiliar_control.tiposReporte
															 	,libro_auxiliar_control.tiposPaginacion,libro_auxiliar_control.tiposAcciones
																,libro_auxiliar_control.tiposColumnasSelect,libro_auxiliar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(libro_auxiliar_control.tiposRelaciones,libro_auxiliar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(libro_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(libro_auxiliar_control);			
	}
	
	actualizarPaginaAreaBusquedas(libro_auxiliar_control) {
		jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedalibro_auxiliar").css("display",libro_auxiliar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(libro_auxiliar_control.htmlTablaOrderBy!=null
			&& libro_auxiliar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//libro_auxiliar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(libro_auxiliar_control.htmlTablaOrderByRel!=null
			&& libro_auxiliar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display","none");
			jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalibro_auxiliar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(libro_auxiliar_control) {
		jQuery("#tdlibro_auxiliarNuevo").css("display",libro_auxiliar_control.strPermisoNuevo);
		jQuery("#trlibro_auxiliarElementos").css("display",libro_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trlibro_auxiliarAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trlibro_auxiliarParametrosAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(libro_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(libro_auxiliar_control);
				
		if(libro_auxiliar_control.libro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(libro_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(libro_auxiliar_control);
	}
	
	actualizarPaginaUsuarioInvitado(libro_auxiliar_control) {
	
		var indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(libro_auxiliar_control) {
		jQuery("#divResumenlibro_auxiliarActualAjaxWebPart").html(libro_auxiliar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control) {
		jQuery("#divAccionesRelacioneslibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaAccionesRelaciones);
			
		libro_auxiliar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(libro_auxiliar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(libro_auxiliar_control) {
		
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+libro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",libro_auxiliar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+libro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",libro_auxiliar_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlibro_auxiliar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("libro_auxiliar",id,"contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		libro_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("libro_auxiliar","empresa","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(libro_auxiliar_control) {
	
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id").val(libro_auxiliar_control.libro_auxiliarActual.id);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-version_row").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		
		if(libro_auxiliar_control.libro_auxiliarActual.id_empresa!=null && libro_auxiliar_control.libro_auxiliarActual.id_empresa>-1){
			if(jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != libro_auxiliar_control.libro_auxiliarActual.id_empresa) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(libro_auxiliar_control.libro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-iniciales").val(libro_auxiliar_control.libro_auxiliarActual.iniciales);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-nombre").val(libro_auxiliar_control.libro_auxiliarActual.nombre);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-secuencial").val(libro_auxiliar_control.libro_auxiliarActual.secuencial);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-incremento").val(libro_auxiliar_control.libro_auxiliarActual.incremento);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-generado_por").val(libro_auxiliar_control.libro_auxiliarActual.generado_por);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-usa_contador_mes").prop('checked',libro_auxiliar_control.libro_auxiliarActual.usa_contador_mes);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+libro_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("libro_auxiliar","contabilidad","","form_libro_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	cargarCombosFK(libro_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(libro_auxiliar_control.strRecargarFkTiposNinguno!=null && libro_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && libro_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(libro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(libro_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(libro_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(libro_auxiliar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(libro_auxiliar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeiniciales").text(libro_auxiliar_control.strMensajeiniciales);		
		jQuery("#spanstrMensajenombre").text(libro_auxiliar_control.strMensajenombre);		
		jQuery("#spanstrMensajesecuencial").text(libro_auxiliar_control.strMensajesecuencial);		
		jQuery("#spanstrMensajeincremento").text(libro_auxiliar_control.strMensajeincremento);		
		jQuery("#spanstrMensajegenerado_por").text(libro_auxiliar_control.strMensajegenerado_por);		
		jQuery("#spanstrMensajeusa_contador_mes").text(libro_auxiliar_control.strMensajeusa_contador_mes);		
	}
	
	actualizarCssBotonesMantenimiento(libro_auxiliar_control) {
		jQuery("#tdbtnNuevolibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolibro_auxiliar").css("display",libro_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlibro_auxiliar").css("display",libro_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlibro_auxiliar").css("display",libro_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslibro_auxiliar").css("display",libro_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncontador_auxiliar").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParacontador_auxiliares(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(libro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,libro_auxiliar_funcion1,libro_auxiliar_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(libro_auxiliar_control) {
		var i=0;
		
		i=libro_auxiliar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(libro_auxiliar_control.libro_auxiliarActual.id);
		jQuery("#t-version_row_"+i+"").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		
		if(libro_auxiliar_control.libro_auxiliarActual.id_empresa!=null && libro_auxiliar_control.libro_auxiliarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != libro_auxiliar_control.libro_auxiliarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(libro_auxiliar_control.libro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(libro_auxiliar_control.libro_auxiliarActual.iniciales);
		jQuery("#t-cel_"+i+"_4").val(libro_auxiliar_control.libro_auxiliarActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(libro_auxiliar_control.libro_auxiliarActual.secuencial);
		jQuery("#t-cel_"+i+"_6").val(libro_auxiliar_control.libro_auxiliarActual.incremento);
		jQuery("#t-cel_"+i+"_7").val(libro_auxiliar_control.libro_auxiliarActual.generado_por);
		jQuery("#t-cel_"+i+"_8").prop('checked',libro_auxiliar_control.libro_auxiliarActual.usa_contador_mes);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(libro_auxiliar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncontador_auxiliar").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacioncontador_auxiliar", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParacontador_auxiliares(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});				
	}
		
	

	registrarSesionParacontador_auxiliares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","contador_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"es","");
	}

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento_automatico","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"s","");
	}

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento_predefinido","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(libro_auxiliar_control) {
		libro_auxiliar_funcion1.registrarControlesTableValidacionEdition(libro_auxiliar_control,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliarConstante,strParametros);
		
		//libro_auxiliar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(libro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa",libro_auxiliar_control.empresasFK);

		if(libro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+libro_auxiliar_control.idFilaTablaActual+"_2",libro_auxiliar_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(libro_auxiliar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(libro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(libro_auxiliar_control.idempresaDefaultFK>-1 && jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != libro_auxiliar_control.idempresaDefaultFK) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(libro_auxiliar_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//libro_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.setDefectoValorCombosempresasFK(libro_auxiliar_control);
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
	onLoadCombosEventosFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				libro_auxiliar_webcontrol1.registrarComboActionChangeCombosempresasFK(libro_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("libro_auxiliar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("libro_auxiliar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(libro_auxiliar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
			if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"libro_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				libro_auxiliar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("libro_auxiliar","FK_Idempresa","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("libro_auxiliar");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			libro_auxiliar_funcion1.validarFormularioJQuery(libro_auxiliar_constante1);
			
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(libro_auxiliar_control) {
		
		jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedalibro_auxiliar").css("display",libro_auxiliar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelibro_auxiliar").css("display",libro_auxiliar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslibro_auxiliar").attr("style",libro_auxiliar_control.strPermisoMostrarTodos);
		
		if(libro_auxiliar_control.strPermisoNuevo!=null) {
			jQuery("#tdlibro_auxiliarNuevo").css("display",libro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdlibro_auxiliarNuevoToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlibro_auxiliarDuplicar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlibro_auxiliarDuplicarToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlibro_auxiliarNuevoGuardarCambios").css("display",libro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdlibro_auxiliarNuevoGuardarCambiosToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(libro_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdlibro_auxiliarActualizarToolBar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlibro_auxiliarCopiar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlibro_auxiliarCopiarToolBar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlibro_auxiliarConEditar").css("display",libro_auxiliar_control.strPermisoActualizar);
		}
		
		jQuery("#tdlibro_auxiliarEliminarToolBar").css("display",libro_auxiliar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdlibro_auxiliarGuardarCambios").css("display",libro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlibro_auxiliarGuardarCambiosToolBar").css("display",libro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trlibro_auxiliarElementos").css("display",libro_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trlibro_auxiliarAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trlibro_auxiliarParametrosAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
			
		jQuery("#tdlibro_auxiliarCerrarPagina").css("display",libro_auxiliar_control.strPermisoPopup);		
		jQuery("#tdlibro_auxiliarCerrarPaginaToolBar").css("display",libro_auxiliar_control.strPermisoPopup);
		//jQuery("#trlibro_auxiliarAccionesRelaciones").css("display",libro_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarEventosControles();
		
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			libro_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(libro_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				libro_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(libro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				libro_auxiliar_webcontrol1.onLoad();
				
			} else {
				if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(libro_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
						//libro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(libro_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(libro_auxiliar_constante1.BIG_ID_ACTUAL,"libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
						//libro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			libro_auxiliar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var libro_auxiliar_webcontrol1=new libro_auxiliar_webcontrol();

if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = libro_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>