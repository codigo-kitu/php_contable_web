//<script type="text/javascript" language="javascript">



//var dato_general_usuarioJQueryPaginaWebInteraccion= function (dato_general_usuario_control) {
//this.,this.,this.

class dato_general_usuario_webcontrol extends dato_general_usuario_webcontrol_add {
	
	dato_general_usuario_control=null;
	dato_general_usuario_controlInicial=null;
	dato_general_usuario_controlAuxiliar=null;
		
	//if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(dato_general_usuario_control) {
		super();
		
		this.dato_general_usuario_control=dato_general_usuario_control;
	}
		
	actualizarVariablesPagina(dato_general_usuario_control) {
		
		if(dato_general_usuario_control.action=="index" || dato_general_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control);		
		}
		else if(dato_general_usuario_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(dato_general_usuario_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(dato_general_usuario_control.action + " Revisar Manejo");
			
			if(dato_general_usuario_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(dato_general_usuario_control);
				
				return;
			}
			
			//if(dato_general_usuario_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(dato_general_usuario_control);
			//}
			
			if(dato_general_usuario_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && dato_general_usuario_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(dato_general_usuario_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(dato_general_usuario_control, false);			
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(dato_general_usuario_control);	
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);	
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(dato_general_usuario_control);
			}
			
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(dato_general_usuario_control);			
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(dato_general_usuario_control);
			}
			
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(dato_general_usuario_control);
			}				
			
			if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(dato_general_usuario_control);
			}
			
			if(dato_general_usuario_control.usuarioActual!=null && dato_general_usuario_control.usuarioActual.field_strUserName!=null &&
			dato_general_usuario_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(dato_general_usuario_control);			
			}
		}
		
		
		if(dato_general_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(dato_general_usuario_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(dato_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(dato_general_usuario_control);
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(dato_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(dato_general_usuario_control);
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control) {
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(dato_general_usuario_control) {
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);				
		this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(dato_general_usuario_control) {
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(dato_general_usuario_control) {
		this.actualizarPaginaImprimir(dato_general_usuario_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(dato_general_usuario_control) {
		this.actualizarPaginaImprimir(dato_general_usuario_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);
			this.actualizarPaginaFormularioAdd(dato_general_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);	
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(dato_general_usuario_control) {
		//FORMULARIO
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(dato_general_usuario_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(dato_general_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);	
		//COMBOS FK
		if(dato_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);
		}
	}
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && dato_general_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_funcion1.esPaginaForm()==true) {
			window.opener.dato_general_usuario_webcontrol1.actualizarPaginaTablaDatos(dato_general_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(dato_general_usuario_control) {
		dato_general_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(dato_general_usuario_control.strAuxiliarUrlPagina);
				
		dato_general_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(dato_general_usuario_control.strAuxiliarTipo,dato_general_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(dato_general_usuario_control) {
		dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
			
		if(dato_general_usuario_funcion1.esPaginaForm()==true) {
			window.opener.dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(dato_general_usuario_control) {
		eval(dato_general_usuario_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(dato_general_usuario_control, mostrar) {
		
		if(mostrar==true) {
			dato_general_usuario_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				dato_general_usuario_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			dato_general_usuario_funcion1.mostrarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			dato_general_usuario_funcion1.mostrarDivMensaje(false,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(dato_general_usuario_control) {
	
		funcionGeneral.printWebPartPage("dato_general_usuario",dato_general_usuario_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliardato_general_usuariosAjaxWebPart").html(dato_general_usuario_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("dato_general_usuario",jQuery("#divTablaDatosReporteAuxiliardato_general_usuariosAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(dato_general_usuario_control) {
		this.dato_general_usuario_controlInicial=dato_general_usuario_control;
			
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(dato_general_usuario_control.strStyleDivArbol,dato_general_usuario_control.strStyleDivContent
																,dato_general_usuario_control.strStyleDivOpcionesBanner,dato_general_usuario_control.strStyleDivExpandirColapsar
																,dato_general_usuario_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=dato_general_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",dato_general_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(dato_general_usuario_control) {
		jQuery("#divTablaDatosdato_general_usuariosAjaxWebPart").html(dato_general_usuario_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdato_general_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdato_general_usuarios=jQuery("#tblTablaDatosdato_general_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("dato_general_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',dato_general_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			dato_general_usuario_webcontrol1.registrarControlesTableEdition(dato_general_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		dato_general_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(dato_general_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(dato_general_usuario_control.dato_general_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(dato_general_usuario_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(dato_general_usuario_control) {
		this.actualizarCssBotonesPagina(dato_general_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(dato_general_usuario_control.tiposReportes,dato_general_usuario_control.tiposReporte
															 	,dato_general_usuario_control.tiposPaginacion,dato_general_usuario_control.tiposAcciones
																,dato_general_usuario_control.tiposColumnasSelect,dato_general_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(dato_general_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(dato_general_usuario_control);			
	}
	
	actualizarPaginaAreaBusquedas(dato_general_usuario_control) {
		jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedadato_general_usuario").css("display",dato_general_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(dato_general_usuario_control.htmlTablaOrderBy!=null
			&& dato_general_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//dato_general_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(dato_general_usuario_control.htmlTablaOrderByRel!=null
			&& dato_general_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display","none");
			jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadato_general_usuario").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(dato_general_usuario_control) {
		jQuery("#tddato_general_usuarioNuevo").css("display",dato_general_usuario_control.strPermisoNuevo);
		jQuery("#trdato_general_usuarioElementos").css("display",dato_general_usuario_control.strVisibleTablaElementos);
		jQuery("#trdato_general_usuarioAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trdato_general_usuarioParametrosAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(dato_general_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(dato_general_usuario_control);
				
		if(dato_general_usuario_control.dato_general_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(dato_general_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(dato_general_usuario_control);
	}
	
	actualizarPaginaUsuarioInvitado(dato_general_usuario_control) {
	
		var indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(dato_general_usuario_control) {
		jQuery("#divResumendato_general_usuarioActualAjaxWebPart").html(dato_general_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(dato_general_usuario_control) {
		jQuery("#divAccionesRelacionesdato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaAccionesRelaciones);
			
		dato_general_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(dato_general_usuario_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(dato_general_usuario_control) {
		
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",dato_general_usuario_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",dato_general_usuario_control.strVisibleFK_Idciudad);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais").attr("style",dato_general_usuario_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais").attr("style",dato_general_usuario_control.strVisibleFK_Idpais);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",dato_general_usuario_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",dato_general_usuario_control.strVisibleFK_Idprovincia);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid").attr("style",dato_general_usuario_control.strVisibleFK_Idusuarioid);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid").attr("style",dato_general_usuario_control.strVisibleFK_Idusuarioid);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondato_general_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("dato_general_usuario",id,"seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","pais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","provincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","ciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(dato_general_usuario_control) {
	
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val(dato_general_usuario_control.dato_general_usuarioActual.id);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-version_row").val(dato_general_usuario_control.dato_general_usuarioActual.versionRow);
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_pais!=null && dato_general_usuario_control.dato_general_usuarioActual.id_pais>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != dato_general_usuario_control.dato_general_usuarioActual.id_pais) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(dato_general_usuario_control.dato_general_usuarioActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_provincia!=null && dato_general_usuario_control.dato_general_usuarioActual.id_provincia>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != dato_general_usuario_control.dato_general_usuarioActual.id_provincia) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(dato_general_usuario_control.dato_general_usuarioActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad!=null && dato_general_usuario_control.dato_general_usuarioActual.id_ciudad>-1){
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != dato_general_usuario_control.dato_general_usuarioActual.id_ciudad) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-cedula").val(dato_general_usuario_control.dato_general_usuarioActual.cedula);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-apellidos").val(dato_general_usuario_control.dato_general_usuarioActual.apellidos);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-nombres").val(dato_general_usuario_control.dato_general_usuarioActual.nombres);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-telefono").val(dato_general_usuario_control.dato_general_usuarioActual.telefono);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-telefono_movil").val(dato_general_usuario_control.dato_general_usuarioActual.telefono_movil);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-e_mail").val(dato_general_usuario_control.dato_general_usuarioActual.e_mail);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-url").val(dato_general_usuario_control.dato_general_usuarioActual.url);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-fecha_nacimiento").val(dato_general_usuario_control.dato_general_usuarioActual.fecha_nacimiento);
		jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-direccion").val(dato_general_usuario_control.dato_general_usuarioActual.direccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+dato_general_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("dato_general_usuario","seguridad","","form_dato_general_usuario",formulario,"","",paraEventoTabla,idFilaTabla,dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	cargarCombosFK(dato_general_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(dato_general_usuario_control.strRecargarFkTiposNinguno!=null && dato_general_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && dato_general_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(dato_general_usuario_control) {
		jQuery("#spanstrMensajeid").text(dato_general_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(dato_general_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_pais").text(dato_general_usuario_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(dato_general_usuario_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(dato_general_usuario_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecedula").text(dato_general_usuario_control.strMensajecedula);		
		jQuery("#spanstrMensajeapellidos").text(dato_general_usuario_control.strMensajeapellidos);		
		jQuery("#spanstrMensajenombres").text(dato_general_usuario_control.strMensajenombres);		
		jQuery("#spanstrMensajetelefono").text(dato_general_usuario_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(dato_general_usuario_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(dato_general_usuario_control.strMensajee_mail);		
		jQuery("#spanstrMensajeurl").text(dato_general_usuario_control.strMensajeurl);		
		jQuery("#spanstrMensajefecha_nacimiento").text(dato_general_usuario_control.strMensajefecha_nacimiento);		
		jQuery("#spanstrMensajedireccion").text(dato_general_usuario_control.strMensajedireccion);		
	}
	
	actualizarCssBotonesMantenimiento(dato_general_usuario_control) {
		jQuery("#tdbtnNuevodato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodato_general_usuario").css("display",dato_general_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardato_general_usuario").css("display",dato_general_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardato_general_usuario").css("display",dato_general_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdato_general_usuario").css("display",dato_general_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardato_general_usuario").css("visibility",dato_general_usuario_control.strVisibleCeldaCancelar);						
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
	

	cargarComboEditarTablausuarioFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.usuariosFK);
	}

	cargarComboEditarTablapaisFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(dato_general_usuario_control) {
		var i=0;
		
		i=dato_general_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(dato_general_usuario_control.dato_general_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(dato_general_usuario_control.dato_general_usuarioActual.versionRow);
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_pais!=null && dato_general_usuario_control.dato_general_usuarioActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != dato_general_usuario_control.dato_general_usuarioActual.id_pais) {
				jQuery("#t-cel_"+i+"_2").val(dato_general_usuario_control.dato_general_usuarioActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_provincia!=null && dato_general_usuario_control.dato_general_usuarioActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != dato_general_usuario_control.dato_general_usuarioActual.id_provincia) {
				jQuery("#t-cel_"+i+"_3").val(dato_general_usuario_control.dato_general_usuarioActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad!=null && dato_general_usuario_control.dato_general_usuarioActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != dato_general_usuario_control.dato_general_usuarioActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_4").val(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(dato_general_usuario_control.dato_general_usuarioActual.cedula);
		jQuery("#t-cel_"+i+"_6").val(dato_general_usuario_control.dato_general_usuarioActual.apellidos);
		jQuery("#t-cel_"+i+"_7").val(dato_general_usuario_control.dato_general_usuarioActual.nombres);
		jQuery("#t-cel_"+i+"_8").val(dato_general_usuario_control.dato_general_usuarioActual.telefono);
		jQuery("#t-cel_"+i+"_9").val(dato_general_usuario_control.dato_general_usuarioActual.telefono_movil);
		jQuery("#t-cel_"+i+"_10").val(dato_general_usuario_control.dato_general_usuarioActual.e_mail);
		jQuery("#t-cel_"+i+"_11").val(dato_general_usuario_control.dato_general_usuarioActual.url);
		jQuery("#t-cel_"+i+"_12").val(dato_general_usuario_control.dato_general_usuarioActual.fecha_nacimiento);
		jQuery("#t-cel_"+i+"_13").val(dato_general_usuario_control.dato_general_usuarioActual.direccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(dato_general_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(dato_general_usuario_control) {
		dato_general_usuario_funcion1.registrarControlesTableValidacionEdition(dato_general_usuario_control,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuarioConstante,strParametros);
		
		//dato_general_usuario_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosusuariosFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id",dato_general_usuario_control.usuariosFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_0",dato_general_usuario_control.usuariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid",dato_general_usuario_control.usuariosFK);

	};

	cargarCombospaissFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais",dato_general_usuario_control.paissFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_2",dato_general_usuario_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",dato_general_usuario_control.paissFK);

	};

	cargarCombosprovinciasFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia",dato_general_usuario_control.provinciasFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_3",dato_general_usuario_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",dato_general_usuario_control.provinciasFK);

	};

	cargarCombosciudadsFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad",dato_general_usuario_control.ciudadsFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_4",dato_general_usuario_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",dato_general_usuario_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombospaissFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val() != dato_general_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val(dato_general_usuario_control.idusuarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(dato_general_usuario_control.idusuarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idpaisDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != dato_general_usuario_control.idpaisDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(dato_general_usuario_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(dato_general_usuario_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idprovinciaDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != dato_general_usuario_control.idprovinciaDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(dato_general_usuario_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(dato_general_usuario_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idciudadDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != dato_general_usuario_control.idciudadDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(dato_general_usuario_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(dato_general_usuario_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//dato_general_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosciudadsFK(dato_general_usuario_control);
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
	onLoadCombosEventosFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombospaissFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("dato_general_usuario");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("dato_general_usuario");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(dato_general_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
			
			if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,"dato_general_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParausuario("id");
				//alert(jQuery('#form-id_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idpais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idprovincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idusuarioid","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			dato_general_usuario_funcion1.validarFormularioJQuery(dato_general_usuario_constante1);
			
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(dato_general_usuario_control) {
		
		jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedadato_general_usuario").css("display",dato_general_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedato_general_usuario").css("display",dato_general_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdato_general_usuario").attr("style",dato_general_usuario_control.strPermisoMostrarTodos);
		
		if(dato_general_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tddato_general_usuarioNuevo").css("display",dato_general_usuario_control.strPermisoNuevo);
			jQuery("#tddato_general_usuarioNuevoToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddato_general_usuarioDuplicar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddato_general_usuarioDuplicarToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddato_general_usuarioNuevoGuardarCambios").css("display",dato_general_usuario_control.strPermisoNuevo);
			jQuery("#tddato_general_usuarioNuevoGuardarCambiosToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(dato_general_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tddato_general_usuarioActualizarToolBar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddato_general_usuarioCopiar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddato_general_usuarioCopiarToolBar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddato_general_usuarioConEditar").css("display",dato_general_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tddato_general_usuarioEliminarToolBar").css("display",dato_general_usuario_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tddato_general_usuarioGuardarCambios").css("display",dato_general_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddato_general_usuarioGuardarCambiosToolBar").css("display",dato_general_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trdato_general_usuarioElementos").css("display",dato_general_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trdato_general_usuarioAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trdato_general_usuarioParametrosAcciones").css("display",dato_general_usuario_control.strVisibleTablaAcciones);
			
		jQuery("#tddato_general_usuarioCerrarPagina").css("display",dato_general_usuario_control.strPermisoPopup);		
		jQuery("#tddato_general_usuarioCerrarPaginaToolBar").css("display",dato_general_usuario_control.strPermisoPopup);
		//jQuery("#trdato_general_usuarioAccionesRelaciones").css("display",dato_general_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarEventosControles();
		
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			dato_general_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(dato_general_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				dato_general_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(dato_general_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				dato_general_usuario_webcontrol1.onLoad();
				
			} else {
				if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
					if(dato_general_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
						//dato_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(dato_general_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(dato_general_usuario_constante1.BIG_ID_ACTUAL,"dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
						//dato_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			dato_general_usuario_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var dato_general_usuario_webcontrol1=new dato_general_usuario_webcontrol();

if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = dato_general_usuario_webcontrol1.onLoadWindow; 
}

//</script>