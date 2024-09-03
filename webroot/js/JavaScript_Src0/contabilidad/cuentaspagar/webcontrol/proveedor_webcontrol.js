//<script type="text/javascript" language="javascript">



//var proveedorJQueryPaginaWebInteraccion= function (proveedor_control) {
//this.,this.,this.

class proveedor_webcontrol extends proveedor_webcontrol_add {
	
	proveedor_control=null;
	proveedor_controlInicial=null;
	proveedor_controlAuxiliar=null;
		
	//if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(proveedor_control) {
		super();
		
		this.proveedor_control=proveedor_control;
	}
		
	actualizarVariablesPagina(proveedor_control) {
		
		if(proveedor_control.action=="index" || proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(proveedor_control);
			
		} else if(proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(proveedor_control);
		
		} else if(proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(proveedor_control);
		
		} else if(proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(proveedor_control);
		
		} else if(proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(proveedor_control);
			
		} else if(proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(proveedor_control);
			
		} else if(proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(proveedor_control);
		
		} else if(proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(proveedor_control);
		
		} else if(proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(proveedor_control);
		
		} else if(proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(proveedor_control);
		
		} else if(proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(proveedor_control);
		
		} else if(proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(proveedor_control);
		
		} else if(proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(proveedor_control);
		
		} else if(proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(proveedor_control);
		
		} else if(proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(proveedor_control);
		
		} else if(proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(proveedor_control);
		
		} else if(proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(proveedor_control);
		
		} else if(proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(proveedor_control);		
		
		} else if(proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(proveedor_control);		
		
		} else if(proveedor_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(proveedor_control);		
		
		} else if(proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control);		
		}
		else if(proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(proveedor_control);		
		}
		else if(proveedor_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(proveedor_control);		
		}
		else if(proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(proveedor_control.action + " Revisar Manejo");
			
			if(proveedor_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(proveedor_control);
				
				return;
			}
			
			//if(proveedor_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(proveedor_control);
			//}
			
			if(proveedor_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && proveedor_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(proveedor_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(proveedor_control, false);			
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(proveedor_control);	
			}
			
			if(proveedor_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(proveedor_control);	
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(proveedor_control);
			}
			
			
			if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(proveedor_control);			
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(proveedor_control);
			}
			
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
			}
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(proveedor_control);
			}				
			
			if(proveedor_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control);
			}
			
			if(proveedor_control.usuarioActual!=null && proveedor_control.usuarioActual.field_strUserName!=null &&
			proveedor_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(proveedor_control);			
			}
		}
		
		
		if(proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(proveedor_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(proveedor_control);
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
		this.actualizarPaginaAreaBusquedas(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(proveedor_control);
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
		this.actualizarPaginaAreaBusquedas(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(proveedor_control) {
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(proveedor_control) {
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(proveedor_control) {
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);				
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(proveedor_control) {
		this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(proveedor_control) {
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(proveedor_control) {
		this.actualizarPaginaImprimir(proveedor_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(proveedor_control) {
		this.actualizarPaginaImprimir(proveedor_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);
			this.actualizarPaginaFormularioAdd(proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);	
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);	
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(proveedor_control) {
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(proveedor_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(proveedor_control) {
		if(proveedor_funcion1.esPaginaForm()==true) {
			window.opener.proveedor_webcontrol1.actualizarPaginaTablaDatos(proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(proveedor_control) {
		proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(proveedor_control.strAuxiliarUrlPagina);
				
		proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(proveedor_control.strAuxiliarTipo,proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(proveedor_control) {
		proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
			
		if(proveedor_funcion1.esPaginaForm()==true) {
			window.opener.proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(proveedor_control) {
		eval(proveedor_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(proveedor_control, mostrar) {
		
		if(mostrar==true) {
			proveedor_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				proveedor_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			proveedor_funcion1.mostrarDivMensaje(true,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			proveedor_funcion1.mostrarDivMensaje(false,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(proveedor_control) {
	
		funcionGeneral.printWebPartPage("proveedor",proveedor_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarproveedorsAjaxWebPart").html(proveedor_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("proveedor",jQuery("#divTablaDatosReporteAuxiliarproveedorsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(proveedor_control) {
		this.proveedor_controlInicial=proveedor_control;
			
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(proveedor_control.strStyleDivArbol,proveedor_control.strStyleDivContent
																,proveedor_control.strStyleDivOpcionesBanner,proveedor_control.strStyleDivExpandirColapsar
																,proveedor_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(proveedor_control) {
		jQuery("#divTablaDatosproveedorsAjaxWebPart").html(proveedor_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproveedors=jQuery("#tblTablaDatosproveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			proveedor_webcontrol1.registrarControlesTableEdition(proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(proveedor_control.proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(proveedor_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(proveedor_control) {
		this.actualizarCssBotonesPagina(proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(proveedor_control.tiposReportes,proveedor_control.tiposReporte
															 	,proveedor_control.tiposPaginacion,proveedor_control.tiposAcciones
																,proveedor_control.tiposColumnasSelect,proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(proveedor_control.tiposRelaciones,proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(proveedor_control);			
	}
	
	actualizarPaginaAreaBusquedas(proveedor_control) {
		jQuery("#divBusquedaproveedorAjaxWebPart").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trproveedorCabeceraBusquedas").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaproveedor").css("display",proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(proveedor_control.htmlTablaOrderBy!=null
			&& proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproveedorAjaxWebPart").html(proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(proveedor_control.htmlTablaOrderByRel!=null
			&& proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproveedorAjaxWebPart").html(proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproveedorAjaxWebPart").css("display","none");
			jQuery("#trproveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproveedor").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(proveedor_control) {
		jQuery("#tdproveedorNuevo").css("display",proveedor_control.strPermisoNuevo);
		jQuery("#trproveedorElementos").css("display",proveedor_control.strVisibleTablaElementos);
		jQuery("#trproveedorAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
		jQuery("#trproveedorParametrosAcciones").css("display",proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(proveedor_control);
				
		if(proveedor_control.proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(proveedor_control);
	}
	
	actualizarPaginaUsuarioInvitado(proveedor_control) {
	
		var indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(proveedor_control) {
		jQuery("#divResumenproveedorActualAjaxWebPart").html(proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control) {
		jQuery("#divAccionesRelacionesproveedorAjaxWebPart").html(proveedor_control.htmlTablaAccionesRelaciones);
			
		proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(proveedor_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(proveedor_control) {
		
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor").attr("style",proveedor_control.strVisibleFK_Idcategoria_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor").attr("style",proveedor_control.strVisibleFK_Idcategoria_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",proveedor_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",proveedor_control.strVisibleFK_Idciudad);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",proveedor_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",proveedor_control.strVisibleFK_Idcuenta);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",proveedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",proveedor_control.strVisibleFK_Idempresa);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor").attr("style",proveedor_control.strVisibleFK_Idgiro_negocio_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor").attr("style",proveedor_control.strVisibleFK_Idgiro_negocio_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",proveedor_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",proveedor_control.strVisibleFK_Idimpuesto);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idpais").attr("style",proveedor_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idpais").attr("style",proveedor_control.strVisibleFK_Idpais);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",proveedor_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",proveedor_control.strVisibleFK_Idprovincia);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",proveedor_control.strVisibleFK_Idtermino_pago_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",proveedor_control.strVisibleFK_Idtermino_pago_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",proveedor_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",proveedor_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("proveedor",id,"cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","empresa","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParacategoria_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","categoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParagiro_negocio_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","giro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","pais","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","provincia","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","ciudad","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","vendedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","termino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","cuenta","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","impuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(proveedor_control) {
	
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id").val(proveedor_control.proveedorActual.id);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-version_row").val(proveedor_control.proveedorActual.versionRow);
		
		if(proveedor_control.proveedorActual.id_empresa!=null && proveedor_control.proveedorActual.id_empresa>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != proveedor_control.proveedorActual.id_empresa) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(proveedor_control.proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_categoria_proveedor!=null && proveedor_control.proveedorActual.id_categoria_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != proveedor_control.proveedorActual.id_categoria_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(proveedor_control.proveedorActual.id_categoria_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_giro_negocio_proveedor!=null && proveedor_control.proveedorActual.id_giro_negocio_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != proveedor_control.proveedorActual.id_giro_negocio_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(proveedor_control.proveedorActual.id_giro_negocio_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-codigo").val(proveedor_control.proveedorActual.codigo);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-ruc").val(proveedor_control.proveedorActual.ruc);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-registro_empresarial").val(proveedor_control.proveedorActual.registro_empresarial);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-primer_apellido").val(proveedor_control.proveedorActual.primer_apellido);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-segundo_apellido").val(proveedor_control.proveedorActual.segundo_apellido);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-primer_nombre").val(proveedor_control.proveedorActual.primer_nombre);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-segundo_nombre").val(proveedor_control.proveedorActual.segundo_nombre);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-nombre_completo").val(proveedor_control.proveedorActual.nombre_completo);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-direccion").val(proveedor_control.proveedorActual.direccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-telefono").val(proveedor_control.proveedorActual.telefono);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-telefono_movil").val(proveedor_control.proveedorActual.telefono_movil);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-e_mail").val(proveedor_control.proveedorActual.e_mail);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-e_mail2").val(proveedor_control.proveedorActual.e_mail2);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-comentario").val(proveedor_control.proveedorActual.comentario);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-imagen").val(proveedor_control.proveedorActual.imagen);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-activo").prop('checked',proveedor_control.proveedorActual.activo);
		
		if(proveedor_control.proveedorActual.id_pais!=null && proveedor_control.proveedorActual.id_pais>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != proveedor_control.proveedorActual.id_pais) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(proveedor_control.proveedorActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_provincia!=null && proveedor_control.proveedorActual.id_provincia>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != proveedor_control.proveedorActual.id_provincia) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(proveedor_control.proveedorActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_ciudad!=null && proveedor_control.proveedorActual.id_ciudad>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != proveedor_control.proveedorActual.id_ciudad) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(proveedor_control.proveedorActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-codigo_postal").val(proveedor_control.proveedorActual.codigo_postal);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-fax").val(proveedor_control.proveedorActual.fax);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-contacto").val(proveedor_control.proveedorActual.contacto);
		
		if(proveedor_control.proveedorActual.id_vendedor!=null && proveedor_control.proveedorActual.id_vendedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != proveedor_control.proveedorActual.id_vendedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(proveedor_control.proveedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-maximo_credito").val(proveedor_control.proveedorActual.maximo_credito);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-maximo_descuento").val(proveedor_control.proveedorActual.maximo_descuento);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-interes_anual").val(proveedor_control.proveedorActual.interes_anual);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-balance").val(proveedor_control.proveedorActual.balance);
		
		if(proveedor_control.proveedorActual.id_termino_pago_proveedor!=null && proveedor_control.proveedorActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != proveedor_control.proveedorActual.id_termino_pago_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(proveedor_control.proveedorActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_cuenta!=null && proveedor_control.proveedorActual.id_cuenta>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != proveedor_control.proveedorActual.id_cuenta) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(proveedor_control.proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_impuesto!=null && proveedor_control.proveedorActual.id_impuesto>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != proveedor_control.proveedorActual.id_impuesto) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(proveedor_control.proveedorActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_impuesto_compras").prop('checked',proveedor_control.proveedorActual.aplica_impuesto_compras);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_impuesto").prop('checked',proveedor_control.proveedorActual.aplica_retencion_impuesto);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_fuente").prop('checked',proveedor_control.proveedorActual.aplica_retencion_fuente);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_ica").prop('checked',proveedor_control.proveedorActual.aplica_retencion_ica);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_2do_impuesto").prop('checked',proveedor_control.proveedorActual.aplica_2do_impuesto);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-creado").val(proveedor_control.proveedorActual.creado);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(proveedor_control.proveedorActual.cuenta_contable_compras);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-retencion_impuesto").val(proveedor_control.proveedorActual.retencion_impuesto);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-retencion_ica").val(proveedor_control.proveedorActual.retencion_ica);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-retencion_fuente").val(proveedor_control.proveedorActual.retencion_fuente);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-segundo_impuesto").val(proveedor_control.proveedorActual.segundo_impuesto);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-impuesto_codigo").val(proveedor_control.proveedorActual.impuesto_codigo);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-campo1").val(proveedor_control.proveedorActual.campo1);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-campo2").val(proveedor_control.proveedorActual.campo2);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-campo3").val(proveedor_control.proveedorActual.campo3);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-tipo_empresa").val(proveedor_control.proveedorActual.tipo_empresa);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-monto_ultima_transaccion").val(proveedor_control.proveedorActual.monto_ultima_transaccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-fecha_ultima_transaccion").val(proveedor_control.proveedorActual.fecha_ultima_transaccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-descripcion_ultima_transaccion").val(proveedor_control.proveedorActual.descripcion_ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("proveedor","cuentaspagar","","form_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	cargarCombosFK(proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(proveedor_control.strRecargarFkTiposNinguno!=null && proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(proveedor_control) {
		jQuery("#spanstrMensajeid").text(proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(proveedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_categoria_proveedor").text(proveedor_control.strMensajeid_categoria_proveedor);		
		jQuery("#spanstrMensajeid_giro_negocio_proveedor").text(proveedor_control.strMensajeid_giro_negocio_proveedor);		
		jQuery("#spanstrMensajecodigo").text(proveedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajeruc").text(proveedor_control.strMensajeruc);		
		jQuery("#spanstrMensajeregistro_empresarial").text(proveedor_control.strMensajeregistro_empresarial);		
		jQuery("#spanstrMensajeprimer_apellido").text(proveedor_control.strMensajeprimer_apellido);		
		jQuery("#spanstrMensajesegundo_apellido").text(proveedor_control.strMensajesegundo_apellido);		
		jQuery("#spanstrMensajeprimer_nombre").text(proveedor_control.strMensajeprimer_nombre);		
		jQuery("#spanstrMensajesegundo_nombre").text(proveedor_control.strMensajesegundo_nombre);		
		jQuery("#spanstrMensajenombre_completo").text(proveedor_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajedireccion").text(proveedor_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(proveedor_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(proveedor_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(proveedor_control.strMensajee_mail);		
		jQuery("#spanstrMensajee_mail2").text(proveedor_control.strMensajee_mail2);		
		jQuery("#spanstrMensajecomentario").text(proveedor_control.strMensajecomentario);		
		jQuery("#spanstrMensajeimagen").text(proveedor_control.strMensajeimagen);		
		jQuery("#spanstrMensajeactivo").text(proveedor_control.strMensajeactivo);		
		jQuery("#spanstrMensajeid_pais").text(proveedor_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(proveedor_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(proveedor_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecodigo_postal").text(proveedor_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(proveedor_control.strMensajefax);		
		jQuery("#spanstrMensajecontacto").text(proveedor_control.strMensajecontacto);		
		jQuery("#spanstrMensajeid_vendedor").text(proveedor_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajemaximo_credito").text(proveedor_control.strMensajemaximo_credito);		
		jQuery("#spanstrMensajemaximo_descuento").text(proveedor_control.strMensajemaximo_descuento);		
		jQuery("#spanstrMensajeinteres_anual").text(proveedor_control.strMensajeinteres_anual);		
		jQuery("#spanstrMensajebalance").text(proveedor_control.strMensajebalance);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(proveedor_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajeid_cuenta").text(proveedor_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_impuesto").text(proveedor_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajeaplica_impuesto_compras").text(proveedor_control.strMensajeaplica_impuesto_compras);		
		jQuery("#spanstrMensajeaplica_retencion_impuesto").text(proveedor_control.strMensajeaplica_retencion_impuesto);		
		jQuery("#spanstrMensajeaplica_retencion_fuente").text(proveedor_control.strMensajeaplica_retencion_fuente);		
		jQuery("#spanstrMensajeaplica_retencion_ica").text(proveedor_control.strMensajeaplica_retencion_ica);		
		jQuery("#spanstrMensajeaplica_2do_impuesto").text(proveedor_control.strMensajeaplica_2do_impuesto);		
		jQuery("#spanstrMensajecreado").text(proveedor_control.strMensajecreado);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(proveedor_control.strMensajecuenta_contable_compras);		
		jQuery("#spanstrMensajeretencion_impuesto").text(proveedor_control.strMensajeretencion_impuesto);		
		jQuery("#spanstrMensajeretencion_ica").text(proveedor_control.strMensajeretencion_ica);		
		jQuery("#spanstrMensajeretencion_fuente").text(proveedor_control.strMensajeretencion_fuente);		
		jQuery("#spanstrMensajesegundo_impuesto").text(proveedor_control.strMensajesegundo_impuesto);		
		jQuery("#spanstrMensajeimpuesto_codigo").text(proveedor_control.strMensajeimpuesto_codigo);		
		jQuery("#spanstrMensajecampo1").text(proveedor_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(proveedor_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(proveedor_control.strMensajecampo3);		
		jQuery("#spanstrMensajetipo_empresa").text(proveedor_control.strMensajetipo_empresa);		
		jQuery("#spanstrMensajemonto_ultima_transaccion").text(proveedor_control.strMensajemonto_ultima_transaccion);		
		jQuery("#spanstrMensajefecha_ultima_transaccion").text(proveedor_control.strMensajefecha_ultima_transaccion);		
		jQuery("#spanstrMensajedescripcion_ultima_transaccion").text(proveedor_control.strMensajedescripcion_ultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(proveedor_control) {
		jQuery("#tdbtnNuevoproveedor").css("visibility",proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproveedor").css("display",proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproveedor").css("visibility",proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproveedor").css("display",proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproveedor").css("visibility",proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproveedor").css("display",proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproveedor").css("visibility",proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproveedor").css("visibility",proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproveedor").css("display",proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionotro_suplidor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});
		jQuery("#imgdivrelacionimagen_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		});
		jQuery("#imgdivrelacioncuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacionlista_precio").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		});
		jQuery("#imgdivrelaciondocumento_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.empresasFK);
	}

	cargarComboEditarTablacategoria_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.categoria_proveedorsFK);
	}

	cargarComboEditarTablagiro_negocio_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.giro_negocio_proveedorsFK);
	}

	cargarComboEditarTablapaisFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablacuentaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(proveedor_control) {
		var i=0;
		
		i=proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(proveedor_control.proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(proveedor_control.proveedorActual.versionRow);
		
		if(proveedor_control.proveedorActual.id_empresa!=null && proveedor_control.proveedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != proveedor_control.proveedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(proveedor_control.proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_categoria_proveedor!=null && proveedor_control.proveedorActual.id_categoria_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != proveedor_control.proveedorActual.id_categoria_proveedor) {
				jQuery("#t-cel_"+i+"_3").val(proveedor_control.proveedorActual.id_categoria_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_giro_negocio_proveedor!=null && proveedor_control.proveedorActual.id_giro_negocio_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != proveedor_control.proveedorActual.id_giro_negocio_proveedor) {
				jQuery("#t-cel_"+i+"_4").val(proveedor_control.proveedorActual.id_giro_negocio_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(proveedor_control.proveedorActual.codigo);
		jQuery("#t-cel_"+i+"_6").val(proveedor_control.proveedorActual.ruc);
		jQuery("#t-cel_"+i+"_7").val(proveedor_control.proveedorActual.registro_empresarial);
		jQuery("#t-cel_"+i+"_8").val(proveedor_control.proveedorActual.primer_apellido);
		jQuery("#t-cel_"+i+"_9").val(proveedor_control.proveedorActual.segundo_apellido);
		jQuery("#t-cel_"+i+"_10").val(proveedor_control.proveedorActual.primer_nombre);
		jQuery("#t-cel_"+i+"_11").val(proveedor_control.proveedorActual.segundo_nombre);
		jQuery("#t-cel_"+i+"_12").val(proveedor_control.proveedorActual.nombre_completo);
		jQuery("#t-cel_"+i+"_13").val(proveedor_control.proveedorActual.direccion);
		jQuery("#t-cel_"+i+"_14").val(proveedor_control.proveedorActual.telefono);
		jQuery("#t-cel_"+i+"_15").val(proveedor_control.proveedorActual.telefono_movil);
		jQuery("#t-cel_"+i+"_16").val(proveedor_control.proveedorActual.e_mail);
		jQuery("#t-cel_"+i+"_17").val(proveedor_control.proveedorActual.e_mail2);
		jQuery("#t-cel_"+i+"_18").val(proveedor_control.proveedorActual.comentario);
		jQuery("#t-cel_"+i+"_19").val(proveedor_control.proveedorActual.imagen);
		jQuery("#t-cel_"+i+"_20").prop('checked',proveedor_control.proveedorActual.activo);
		
		if(proveedor_control.proveedorActual.id_pais!=null && proveedor_control.proveedorActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_21").val() != proveedor_control.proveedorActual.id_pais) {
				jQuery("#t-cel_"+i+"_21").val(proveedor_control.proveedorActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_21").select2("val", null);
			if(jQuery("#t-cel_"+i+"_21").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_21").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_provincia!=null && proveedor_control.proveedorActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_22").val() != proveedor_control.proveedorActual.id_provincia) {
				jQuery("#t-cel_"+i+"_22").val(proveedor_control.proveedorActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_22").select2("val", null);
			if(jQuery("#t-cel_"+i+"_22").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_22").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_ciudad!=null && proveedor_control.proveedorActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != proveedor_control.proveedorActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_23").val(proveedor_control.proveedorActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_23").select2("val", null);
			if(jQuery("#t-cel_"+i+"_23").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_24").val(proveedor_control.proveedorActual.codigo_postal);
		jQuery("#t-cel_"+i+"_25").val(proveedor_control.proveedorActual.fax);
		jQuery("#t-cel_"+i+"_26").val(proveedor_control.proveedorActual.contacto);
		
		if(proveedor_control.proveedorActual.id_vendedor!=null && proveedor_control.proveedorActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_27").val() != proveedor_control.proveedorActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_27").val(proveedor_control.proveedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_27").select2("val", null);
			if(jQuery("#t-cel_"+i+"_27").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_27").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_28").val(proveedor_control.proveedorActual.maximo_credito);
		jQuery("#t-cel_"+i+"_29").val(proveedor_control.proveedorActual.maximo_descuento);
		jQuery("#t-cel_"+i+"_30").val(proveedor_control.proveedorActual.interes_anual);
		jQuery("#t-cel_"+i+"_31").val(proveedor_control.proveedorActual.balance);
		
		if(proveedor_control.proveedorActual.id_termino_pago_proveedor!=null && proveedor_control.proveedorActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_32").val() != proveedor_control.proveedorActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_32").val(proveedor_control.proveedorActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_32").select2("val", null);
			if(jQuery("#t-cel_"+i+"_32").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_32").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_cuenta!=null && proveedor_control.proveedorActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_33").val() != proveedor_control.proveedorActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_33").val(proveedor_control.proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_33").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_33").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_impuesto!=null && proveedor_control.proveedorActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_34").val() != proveedor_control.proveedorActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_34").val(proveedor_control.proveedorActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_34").select2("val", null);
			if(jQuery("#t-cel_"+i+"_34").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_34").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_35").prop('checked',proveedor_control.proveedorActual.aplica_impuesto_compras);
		jQuery("#t-cel_"+i+"_36").prop('checked',proveedor_control.proveedorActual.aplica_retencion_impuesto);
		jQuery("#t-cel_"+i+"_37").prop('checked',proveedor_control.proveedorActual.aplica_retencion_fuente);
		jQuery("#t-cel_"+i+"_38").prop('checked',proveedor_control.proveedorActual.aplica_retencion_ica);
		jQuery("#t-cel_"+i+"_39").prop('checked',proveedor_control.proveedorActual.aplica_2do_impuesto);
		jQuery("#t-cel_"+i+"_40").val(proveedor_control.proveedorActual.creado);
		jQuery("#t-cel_"+i+"_41").val(proveedor_control.proveedorActual.cuenta_contable_compras);
		jQuery("#t-cel_"+i+"_42").val(proveedor_control.proveedorActual.retencion_impuesto);
		jQuery("#t-cel_"+i+"_43").val(proveedor_control.proveedorActual.retencion_ica);
		jQuery("#t-cel_"+i+"_44").val(proveedor_control.proveedorActual.retencion_fuente);
		jQuery("#t-cel_"+i+"_45").val(proveedor_control.proveedorActual.segundo_impuesto);
		jQuery("#t-cel_"+i+"_46").val(proveedor_control.proveedorActual.impuesto_codigo);
		jQuery("#t-cel_"+i+"_47").val(proveedor_control.proveedorActual.campo1);
		jQuery("#t-cel_"+i+"_48").val(proveedor_control.proveedorActual.campo2);
		jQuery("#t-cel_"+i+"_49").val(proveedor_control.proveedorActual.campo3);
		jQuery("#t-cel_"+i+"_50").val(proveedor_control.proveedorActual.tipo_empresa);
		jQuery("#t-cel_"+i+"_51").val(proveedor_control.proveedorActual.monto_ultima_transaccion);
		jQuery("#t-cel_"+i+"_52").val(proveedor_control.proveedorActual.fecha_ultima_transaccion);
		jQuery("#t-cel_"+i+"_53").val(proveedor_control.proveedorActual.descripcion_ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_suplidor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionotro_suplidor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_proveedor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionimagen_proveedor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_pagar").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacioncuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_precio").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionlista_precio", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_proveedor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelaciondocumento_proveedor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		});				
	}
		
	

	registrarSesionParaotro_suplidores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","otro_suplidor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"es","");
	}

	registrarSesionParaimagen_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","imagen_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"es","");
	}

	registrarSesionParacuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","cuenta_pagar","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"s","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","orden_compra","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"s","");
	}

	registrarSesionParalista_precioes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","lista_precio","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"es","");
	}

	registrarSesionParadocumento_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","documento_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"es","");
	}
	
	registrarControlesTableEdition(proveedor_control) {
		proveedor_funcion1.registrarControlesTableValidacionEdition(proveedor_control,proveedor_webcontrol1,proveedor_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedorConstante,strParametros);
		
		//proveedor_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosempresasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa",proveedor_control.empresasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_2",proveedor_control.empresasFK);
		}
	};

	cargarComboscategoria_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_3",proveedor_control.categoria_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

	};

	cargarCombosgiro_negocio_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_4",proveedor_control.giro_negocio_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

	};

	cargarCombospaissFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais",proveedor_control.paissFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_21",proveedor_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",proveedor_control.paissFK);

	};

	cargarCombosprovinciasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia",proveedor_control.provinciasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_22",proveedor_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",proveedor_control.provinciasFK);

	};

	cargarCombosciudadsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad",proveedor_control.ciudadsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_23",proveedor_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",proveedor_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor",proveedor_control.vendedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_27",proveedor_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",proveedor_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_32",proveedor_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

	};

	cargarComboscuentasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta",proveedor_control.cuentasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_33",proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",proveedor_control.cuentasFK);

	};

	cargarCombosimpuestosFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto",proveedor_control.impuestosFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_34",proveedor_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",proveedor_control.impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(proveedor_control) {

	};

	registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombospaissFK(proveedor_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosciudadsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcategoria_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != proveedor_control.idcategoria_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idgiro_negocio_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != proveedor_control.idgiro_negocio_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idpaisDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != proveedor_control.idpaisDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(proveedor_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(proveedor_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idprovinciaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != proveedor_control.idprovinciaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(proveedor_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(proveedor_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idciudadDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != proveedor_control.idciudadDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(proveedor_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(proveedor_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idvendedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != proveedor_control.idvendedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(proveedor_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(proveedor_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != proveedor_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idimpuestoDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != proveedor_control.idimpuestoDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(proveedor_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(proveedor_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosimpuestosFK(proveedor_control);
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
	onLoadCombosEventosFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombospaissFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosprovinciasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosciudadsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosvendedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosimpuestosFK(proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("proveedor");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("proveedor");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
			if(proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_proveedor","id_categoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacategoria_proveedor("id_categoria_proveedor");
				//alert(jQuery('#form-id_categoria_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_proveedor","id_giro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParagiro_negocio_proveedor("id_giro_negocio_proveedor");
				//alert(jQuery('#form-id_giro_negocio_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idcategoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idciudad","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idcuenta","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idempresa","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idgiro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idimpuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idpais","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idprovincia","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idtermino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idvendedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("proveedor");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			proveedor_funcion1.validarFormularioJQuery(proveedor_constante1);
			
			if(proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(proveedor_control) {
		
		jQuery("#divBusquedaproveedorAjaxWebPart").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trproveedorCabeceraBusquedas").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaproveedor").css("display",proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproveedor").css("display",proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproveedor").attr("style",proveedor_control.strPermisoMostrarTodos);
		
		if(proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdproveedorNuevo").css("display",proveedor_control.strPermisoNuevo);
			jQuery("#tdproveedorNuevoToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproveedorDuplicar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproveedorDuplicarToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproveedorNuevoGuardarCambios").css("display",proveedor_control.strPermisoNuevo);
			jQuery("#tdproveedorNuevoGuardarCambiosToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdproveedorActualizarToolBar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproveedorCopiar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproveedorCopiarToolBar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproveedorConEditar").css("display",proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdproveedorEliminarToolBar").css("display",proveedor_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdproveedorGuardarCambios").css("display",proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproveedorGuardarCambiosToolBar").css("display",proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trproveedorElementos").css("display",proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trproveedorAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
		jQuery("#trproveedorParametrosAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
			
		jQuery("#tdproveedorCerrarPagina").css("display",proveedor_control.strPermisoPopup);		
		jQuery("#tdproveedorCerrarPaginaToolBar").css("display",proveedor_control.strPermisoPopup);
		//jQuery("#trproveedorAccionesRelaciones").css("display",proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarEventosControles();
		
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				proveedor_webcontrol1.onLoad();
				
			} else {
				if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
					if(proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
						//proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(proveedor_constante1.BIG_ID_ACTUAL,"proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
						//proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			proveedor_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var proveedor_webcontrol1=new proveedor_webcontrol();

if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = proveedor_webcontrol1.onLoadWindow; 
}

//</script>