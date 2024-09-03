//<script type="text/javascript" language="javascript">



//var contador_auxiliarJQueryPaginaWebInteraccion= function (contador_auxiliar_control) {
//this.,this.,this.

class contador_auxiliar_webcontrol extends contador_auxiliar_webcontrol_add {
	
	contador_auxiliar_control=null;
	contador_auxiliar_controlInicial=null;
	contador_auxiliar_controlAuxiliar=null;
		
	//if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(contador_auxiliar_control) {
		super();
		
		this.contador_auxiliar_control=contador_auxiliar_control;
	}
		
	actualizarVariablesPagina(contador_auxiliar_control) {
		
		if(contador_auxiliar_control.action=="index" || contador_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control);		
		}
		else if(contador_auxiliar_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(contador_auxiliar_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(contador_auxiliar_control.action + " Revisar Manejo");
			
			if(contador_auxiliar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(contador_auxiliar_control);
				
				return;
			}
			
			//if(contador_auxiliar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(contador_auxiliar_control);
			//}
			
			if(contador_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && contador_auxiliar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(contador_auxiliar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(contador_auxiliar_control, false);			
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(contador_auxiliar_control);	
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);	
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(contador_auxiliar_control);
			}
			
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(contador_auxiliar_control);			
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(contador_auxiliar_control);
			}
			
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(contador_auxiliar_control);
			}				
			
			if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(contador_auxiliar_control);
			}
			
			if(contador_auxiliar_control.usuarioActual!=null && contador_auxiliar_control.usuarioActual.field_strUserName!=null &&
			contador_auxiliar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(contador_auxiliar_control);			
			}
		}
		
		
		if(contador_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(contador_auxiliar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(contador_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(contador_auxiliar_control);
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(contador_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(contador_auxiliar_control);
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control) {
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(contador_auxiliar_control) {
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);				
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(contador_auxiliar_control) {
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(contador_auxiliar_control) {
		this.actualizarPaginaImprimir(contador_auxiliar_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(contador_auxiliar_control) {
		this.actualizarPaginaImprimir(contador_auxiliar_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);
			this.actualizarPaginaFormularioAdd(contador_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);	
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(contador_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);	
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && contador_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.contador_auxiliar_webcontrol1.actualizarPaginaTablaDatos(contador_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(contador_auxiliar_control) {
		contador_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(contador_auxiliar_control.strAuxiliarUrlPagina);
				
		contador_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(contador_auxiliar_control.strAuxiliarTipo,contador_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(contador_auxiliar_control) {
		contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
			
		if(contador_auxiliar_funcion1.esPaginaForm()==true) {
			window.opener.contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(contador_auxiliar_control) {
		eval(contador_auxiliar_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(contador_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			contador_auxiliar_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				contador_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			contador_auxiliar_funcion1.mostrarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			contador_auxiliar_funcion1.mostrarDivMensaje(false,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(contador_auxiliar_control) {
	
		funcionGeneral.printWebPartPage("contador_auxiliar",contador_auxiliar_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarcontador_auxiliarsAjaxWebPart").html(contador_auxiliar_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("contador_auxiliar",jQuery("#divTablaDatosReporteAuxiliarcontador_auxiliarsAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(contador_auxiliar_control) {
		this.contador_auxiliar_controlInicial=contador_auxiliar_control;
			
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(contador_auxiliar_control.strStyleDivArbol,contador_auxiliar_control.strStyleDivContent
																,contador_auxiliar_control.strStyleDivOpcionesBanner,contador_auxiliar_control.strStyleDivExpandirColapsar
																,contador_auxiliar_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=contador_auxiliar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",contador_auxiliar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(contador_auxiliar_control) {
		jQuery("#divTablaDatoscontador_auxiliarsAjaxWebPart").html(contador_auxiliar_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscontador_auxiliars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscontador_auxiliars=jQuery("#tblTablaDatoscontador_auxiliars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("contador_auxiliar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',contador_auxiliar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			contador_auxiliar_webcontrol1.registrarControlesTableEdition(contador_auxiliar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		contador_auxiliar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(contador_auxiliar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(contador_auxiliar_control.contador_auxiliarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(contador_auxiliar_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(contador_auxiliar_control) {
		this.actualizarCssBotonesPagina(contador_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(contador_auxiliar_control.tiposReportes,contador_auxiliar_control.tiposReporte
															 	,contador_auxiliar_control.tiposPaginacion,contador_auxiliar_control.tiposAcciones
																,contador_auxiliar_control.tiposColumnasSelect,contador_auxiliar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(contador_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(contador_auxiliar_control);			
	}
	
	actualizarPaginaAreaBusquedas(contador_auxiliar_control) {
		jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedacontador_auxiliar").css("display",contador_auxiliar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(contador_auxiliar_control.htmlTablaOrderBy!=null
			&& contador_auxiliar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//contador_auxiliar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(contador_auxiliar_control.htmlTablaOrderByRel!=null
			&& contador_auxiliar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display","none");
			jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacontador_auxiliar").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(contador_auxiliar_control) {
		jQuery("#tdcontador_auxiliarNuevo").css("display",contador_auxiliar_control.strPermisoNuevo);
		jQuery("#trcontador_auxiliarElementos").css("display",contador_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trcontador_auxiliarAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trcontador_auxiliarParametrosAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(contador_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(contador_auxiliar_control);
				
		if(contador_auxiliar_control.contador_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(contador_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(contador_auxiliar_control);
	}
	
	actualizarPaginaUsuarioInvitado(contador_auxiliar_control) {
	
		var indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(contador_auxiliar_control) {
		jQuery("#divResumencontador_auxiliarActualAjaxWebPart").html(contador_auxiliar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(contador_auxiliar_control) {
		jQuery("#divAccionesRelacionescontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaAccionesRelaciones);
			
		contador_auxiliar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(contador_auxiliar_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(contador_auxiliar_control) {
		
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",contador_auxiliar_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",contador_auxiliar_control.strVisibleFK_Idlibro_auxiliar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncontador_auxiliar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("contador_auxiliar",id,"contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);		
	}
	
	

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		contador_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("contador_auxiliar","libro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(contador_auxiliar_control) {
	
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id").val(contador_auxiliar_control.contador_auxiliarActual.id);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-version_row").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_contador").val(contador_auxiliar_control.contador_auxiliarActual.id_contador);
		
		if(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar!=null && contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-periodo_anual").val(contador_auxiliar_control.contador_auxiliarActual.periodo_anual);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-mes").val(contador_auxiliar_control.contador_auxiliarActual.mes);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-contador").val(contador_auxiliar_control.contador_auxiliarActual.contador);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+contador_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("contador_auxiliar","contabilidad","","form_contador_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	cargarCombosFK(contador_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(contador_auxiliar_control.strRecargarFkTiposNinguno!=null && contador_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && contador_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(contador_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(contador_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(contador_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(contador_auxiliar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_contador").text(contador_auxiliar_control.strMensajeid_contador);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(contador_auxiliar_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeperiodo_anual").text(contador_auxiliar_control.strMensajeperiodo_anual);		
		jQuery("#spanstrMensajemes").text(contador_auxiliar_control.strMensajemes);		
		jQuery("#spanstrMensajecontador").text(contador_auxiliar_control.strMensajecontador);		
	}
	
	actualizarCssBotonesMantenimiento(contador_auxiliar_control) {
		jQuery("#tdbtnNuevocontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocontador_auxiliar").css("display",contador_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcontador_auxiliar").css("display",contador_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcontador_auxiliar").css("display",contador_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscontador_auxiliar").css("display",contador_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablalibro_auxiliarFK(contador_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,contador_auxiliar_funcion1,contador_auxiliar_control.libro_auxiliarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(contador_auxiliar_control) {
		var i=0;
		
		i=contador_auxiliar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(contador_auxiliar_control.contador_auxiliarActual.id);
		jQuery("#t-version_row_"+i+"").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(contador_auxiliar_control.contador_auxiliarActual.id_contador);
		
		if(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar!=null && contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_3").val(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(contador_auxiliar_control.contador_auxiliarActual.periodo_anual);
		jQuery("#t-cel_"+i+"_5").val(contador_auxiliar_control.contador_auxiliarActual.mes);
		jQuery("#t-cel_"+i+"_6").val(contador_auxiliar_control.contador_auxiliarActual.contador);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(contador_auxiliar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(contador_auxiliar_control) {
		contador_auxiliar_funcion1.registrarControlesTableValidacionEdition(contador_auxiliar_control,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliarConstante,strParametros);
		
		//contador_auxiliar_funcion1.cancelarOnComplete();
	}	
	
	
	cargarComboslibro_auxiliarsFK(contador_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

		if(contador_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+contador_auxiliar_control.idFilaTablaActual+"_3",contador_auxiliar_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

	};

	
	
	registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control) {

	};

	
	
	setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(contador_auxiliar_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != contador_auxiliar_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//contador_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control);
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
	onLoadCombosEventosFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				contador_auxiliar_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("contador_auxiliar");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("contador_auxiliar");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(contador_auxiliar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
			
			if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,"contador_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				contador_auxiliar_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("contador_auxiliar","FK_Idlibro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			contador_auxiliar_funcion1.validarFormularioJQuery(contador_auxiliar_constante1);
			
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(contador_auxiliar_control) {
		
		jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedacontador_auxiliar").css("display",contador_auxiliar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecontador_auxiliar").css("display",contador_auxiliar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscontador_auxiliar").attr("style",contador_auxiliar_control.strPermisoMostrarTodos);
		
		if(contador_auxiliar_control.strPermisoNuevo!=null) {
			jQuery("#tdcontador_auxiliarNuevo").css("display",contador_auxiliar_control.strPermisoNuevo);
			jQuery("#tdcontador_auxiliarNuevoToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcontador_auxiliarDuplicar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcontador_auxiliarDuplicarToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcontador_auxiliarNuevoGuardarCambios").css("display",contador_auxiliar_control.strPermisoNuevo);
			jQuery("#tdcontador_auxiliarNuevoGuardarCambiosToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(contador_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdcontador_auxiliarActualizarToolBar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcontador_auxiliarCopiar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcontador_auxiliarCopiarToolBar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcontador_auxiliarConEditar").css("display",contador_auxiliar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcontador_auxiliarEliminarToolBar").css("display",contador_auxiliar_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdcontador_auxiliarGuardarCambios").css("display",contador_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcontador_auxiliarGuardarCambiosToolBar").css("display",contador_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trcontador_auxiliarElementos").css("display",contador_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trcontador_auxiliarAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trcontador_auxiliarParametrosAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
			
		jQuery("#tdcontador_auxiliarCerrarPagina").css("display",contador_auxiliar_control.strPermisoPopup);		
		jQuery("#tdcontador_auxiliarCerrarPaginaToolBar").css("display",contador_auxiliar_control.strPermisoPopup);
		//jQuery("#trcontador_auxiliarAccionesRelaciones").css("display",contador_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarEventosControles();
		
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			contador_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(contador_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				contador_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(contador_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				contador_auxiliar_webcontrol1.onLoad();
				
			} else {
				if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
					if(contador_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
						//contador_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(contador_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(contador_auxiliar_constante1.BIG_ID_ACTUAL,"contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
						//contador_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			contador_auxiliar_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var contador_auxiliar_webcontrol1=new contador_auxiliar_webcontrol();

if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = contador_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>