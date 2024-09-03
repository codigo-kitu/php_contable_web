//<script type="text/javascript" language="javascript">



//var imagen_proveedorJQueryPaginaWebInteraccion= function (imagen_proveedor_control) {
//this.,this.,this.

class imagen_proveedor_webcontrol extends imagen_proveedor_webcontrol_add {
	
	imagen_proveedor_control=null;
	imagen_proveedor_controlInicial=null;
	imagen_proveedor_controlAuxiliar=null;
		
	//if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_proveedor_control) {
		super();
		
		this.imagen_proveedor_control=imagen_proveedor_control;
	}
		
	actualizarVariablesPagina(imagen_proveedor_control) {
		
		if(imagen_proveedor_control.action=="index" || imagen_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control);		
		}
		else if(imagen_proveedor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_proveedor_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(imagen_proveedor_control.action + " Revisar Manejo");
			
			if(imagen_proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(imagen_proveedor_control);
				
				return;
			}
			
			//if(imagen_proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(imagen_proveedor_control);
			//}
			
			if(imagen_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(imagen_proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(imagen_proveedor_control, false);			
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(imagen_proveedor_control);	
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);	
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(imagen_proveedor_control);
			}
			
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(imagen_proveedor_control);			
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(imagen_proveedor_control);
			}
			
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(imagen_proveedor_control);
			}				
			
			if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_proveedor_control);
			}
			
			if(imagen_proveedor_control.usuarioActual!=null && imagen_proveedor_control.usuarioActual.field_strUserName!=null &&
			imagen_proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(imagen_proveedor_control);			
			}
		}
		
		
		if(imagen_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(imagen_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_proveedor_control);
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
		this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_proveedor_control);
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
		this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control) {
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_proveedor_control) {
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);				
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_proveedor_control) {
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_proveedor_control) {
		this.actualizarPaginaImprimir(imagen_proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_proveedor_control) {
		this.actualizarPaginaImprimir(imagen_proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);
			this.actualizarPaginaFormularioAdd(imagen_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);	
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);	
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.imagen_proveedor_webcontrol1.actualizarPaginaTablaDatos(imagen_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_proveedor_control) {
		imagen_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_proveedor_control.strAuxiliarUrlPagina);
				
		imagen_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_proveedor_control.strAuxiliarTipo,imagen_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_proveedor_control) {
		imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
			
		if(imagen_proveedor_funcion1.esPaginaForm()==true) {
			window.opener.imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(imagen_proveedor_control) {
		eval(imagen_proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(imagen_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			imagen_proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			imagen_proveedor_funcion1.mostrarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_proveedor_funcion1.mostrarDivMensaje(false,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(imagen_proveedor_control) {
	
		funcionGeneral.printWebPartPage("imagen_proveedor",imagen_proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarimagen_proveedorsAjaxWebPart").html(imagen_proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("imagen_proveedor",jQuery("#divTablaDatosReporteAuxiliarimagen_proveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(imagen_proveedor_control) {
		this.imagen_proveedor_controlInicial=imagen_proveedor_control;
			
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_proveedor_control.strStyleDivArbol,imagen_proveedor_control.strStyleDivContent
																,imagen_proveedor_control.strStyleDivOpcionesBanner,imagen_proveedor_control.strStyleDivExpandirColapsar
																,imagen_proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(imagen_proveedor_control) {
		jQuery("#divTablaDatosimagen_proveedorsAjaxWebPart").html(imagen_proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_proveedors=jQuery("#tblTablaDatosimagen_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_proveedor_webcontrol1.registrarControlesTableEdition(imagen_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(imagen_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_proveedor_control.imagen_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(imagen_proveedor_control) {
		this.actualizarCssBotonesPagina(imagen_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_proveedor_control.tiposReportes,imagen_proveedor_control.tiposReporte
															 	,imagen_proveedor_control.tiposPaginacion,imagen_proveedor_control.tiposAcciones
																,imagen_proveedor_control.tiposColumnasSelect,imagen_proveedor_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(imagen_proveedor_control) {
		jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trimagen_proveedorCabeceraBusquedas").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_proveedor").css("display",imagen_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_proveedor_control.htmlTablaOrderBy!=null
			&& imagen_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_proveedor_control.htmlTablaOrderByRel!=null
			&& imagen_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display","none");
			jQuery("#trimagen_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_proveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(imagen_proveedor_control) {
		jQuery("#tdimagen_proveedorNuevo").css("display",imagen_proveedor_control.strPermisoNuevo);
		jQuery("#trimagen_proveedorElementos").css("display",imagen_proveedor_control.strVisibleTablaElementos);
		jQuery("#trimagen_proveedorAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trimagen_proveedorParametrosAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_proveedor_control);
				
		if(imagen_proveedor_control.imagen_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(imagen_proveedor_control) {
	
		var indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_proveedor_control) {
		jQuery("#divResumenimagen_proveedorActualAjaxWebPart").html(imagen_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_proveedor_control) {
		jQuery("#divAccionesRelacionesimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaAccionesRelaciones);
			
		imagen_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_proveedor_control) {
		
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",imagen_proveedor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",imagen_proveedor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_proveedor",id,"cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		imagen_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_proveedor","proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_proveedor_control) {
	
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id").val(imagen_proveedor_control.imagen_proveedorActual.id);
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-version_row").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		
		if(imagen_proveedor_control.imagen_proveedorActual.id_proveedor!=null && imagen_proveedor_control.imagen_proveedorActual.id_proveedor>-1){
			if(jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != imagen_proveedor_control.imagen_proveedorActual.id_proveedor) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(imagen_proveedor_control.imagen_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-imagen").val(imagen_proveedor_control.imagen_proveedorActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_proveedor","cuentaspagar","","form_imagen_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	cargarCombosFK(imagen_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_proveedor_control.strRecargarFkTiposNinguno!=null && imagen_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(imagen_proveedor_control) {
		jQuery("#spanstrMensajeid").text(imagen_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_proveedor").text(imagen_proveedor_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeimagen").text(imagen_proveedor_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_proveedor_control) {
		jQuery("#tdbtnNuevoimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_proveedor").css("display",imagen_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_proveedor").css("display",imagen_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_proveedor").css("display",imagen_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_proveedor").css("display",imagen_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablaproveedorFK(imagen_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_proveedor_funcion1,imagen_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(imagen_proveedor_control) {
		var i=0;
		
		i=imagen_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_proveedor_control.imagen_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		
		if(imagen_proveedor_control.imagen_proveedorActual.id_proveedor!=null && imagen_proveedor_control.imagen_proveedorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_proveedor_control.imagen_proveedorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(imagen_proveedor_control.imagen_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_proveedor_control.imagen_proveedorActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_proveedor_control) {
		imagen_proveedor_funcion1.registrarControlesTableValidacionEdition(imagen_proveedor_control,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedorConstante,strParametros);
		
		//imagen_proveedor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproveedorsFK(imagen_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor",imagen_proveedor_control.proveedorsFK);

		if(imagen_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_proveedor_control.idFilaTablaActual+"_2",imagen_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",imagen_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(imagen_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != imagen_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(imagen_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(imagen_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(imagen_proveedor_control);
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
	onLoadCombosEventosFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
			
			if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,"imagen_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				imagen_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_proveedor","FK_Idproveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			imagen_proveedor_funcion1.validarFormularioJQuery(imagen_proveedor_constante1);
			
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_proveedor_control) {
		
		jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trimagen_proveedorCabeceraBusquedas").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_proveedor").css("display",imagen_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_proveedor").css("display",imagen_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_proveedor").attr("style",imagen_proveedor_control.strPermisoMostrarTodos);
		
		if(imagen_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_proveedorNuevo").css("display",imagen_proveedor_control.strPermisoNuevo);
			jQuery("#tdimagen_proveedorNuevoToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_proveedorDuplicar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_proveedorDuplicarToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_proveedorNuevoGuardarCambios").css("display",imagen_proveedor_control.strPermisoNuevo);
			jQuery("#tdimagen_proveedorNuevoGuardarCambiosToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_proveedorActualizarToolBar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_proveedorCopiar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_proveedorCopiarToolBar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_proveedorConEditar").css("display",imagen_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_proveedorEliminarToolBar").css("display",imagen_proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdimagen_proveedorGuardarCambios").css("display",imagen_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_proveedorGuardarCambiosToolBar").css("display",imagen_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trimagen_proveedorElementos").css("display",imagen_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_proveedorAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trimagen_proveedorParametrosAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdimagen_proveedorCerrarPagina").css("display",imagen_proveedor_control.strPermisoPopup);		
		jQuery("#tdimagen_proveedorCerrarPaginaToolBar").css("display",imagen_proveedor_control.strPermisoPopup);
		//jQuery("#trimagen_proveedorAccionesRelaciones").css("display",imagen_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarEventosControles();
		
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			imagen_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_proveedor_webcontrol1.onLoad();
				
			} else {
				if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(imagen_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
						//imagen_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(imagen_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_proveedor_constante1.BIG_ID_ACTUAL,"imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
						//imagen_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			imagen_proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var imagen_proveedor_webcontrol1=new imagen_proveedor_webcontrol();

if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_proveedor_webcontrol1.onLoadWindow; 
}

//</script>