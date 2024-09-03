//<script type="text/javascript" language="javascript">



//var tipo_tecla_mascaraJQueryPaginaWebInteraccion= function (tipo_tecla_mascara_control) {
//this.,this.,this.

class tipo_tecla_mascara_webcontrol extends tipo_tecla_mascara_webcontrol_add {
	
	tipo_tecla_mascara_control=null;
	tipo_tecla_mascara_controlInicial=null;
	tipo_tecla_mascara_controlAuxiliar=null;
		
	//if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_tecla_mascara_control) {
		super();
		
		this.tipo_tecla_mascara_control=tipo_tecla_mascara_control;
	}
		
	actualizarVariablesPagina(tipo_tecla_mascara_control) {
		
		if(tipo_tecla_mascara_control.action=="index" || tipo_tecla_mascara_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control);		
		}
		else if(tipo_tecla_mascara_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control);		
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(tipo_tecla_mascara_control.action + " Revisar Manejo");
			
			if(tipo_tecla_mascara_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
				
				return;
			}
			
			//if(tipo_tecla_mascara_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(tipo_tecla_mascara_control);
			//}
			
			if(tipo_tecla_mascara_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_tecla_mascara_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, false);			
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);	
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);	
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
			}
			
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(tipo_tecla_mascara_control);			
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(tipo_tecla_mascara_control);
			}
			
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(tipo_tecla_mascara_control);
			}				
			
			if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_tecla_mascara_control);
			}
			
			if(tipo_tecla_mascara_control.usuarioActual!=null && tipo_tecla_mascara_control.usuarioActual.field_strUserName!=null &&
			tipo_tecla_mascara_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(tipo_tecla_mascara_control);			
			}
		}
		
		
		if(tipo_tecla_mascara_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_tecla_mascara_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_tecla_mascara_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control) {
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_tecla_mascara_control) {
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);				
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_tecla_mascara_control) {
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_tecla_mascara_control) {
		this.actualizarPaginaImprimir(tipo_tecla_mascara_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_tecla_mascara_control) {
		this.actualizarPaginaImprimir(tipo_tecla_mascara_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_tecla_mascara_control) {
		//FORMULARIO
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
			this.actualizarPaginaFormularioAdd(tipo_tecla_mascara_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//COMBOS FK
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_tecla_mascara_control) {
		//FORMULARIO
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);	
		//COMBOS FK
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	
	
	
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_tecla_mascara_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_funcion1.esPaginaForm()==true) {
			window.opener.tipo_tecla_mascara_webcontrol1.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_tecla_mascara_control.strAuxiliarUrlPagina);
				
		tipo_tecla_mascara_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_tecla_mascara_control.strAuxiliarTipo,tipo_tecla_mascara_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
			
		if(tipo_tecla_mascara_funcion1.esPaginaForm()==true) {
			window.opener.tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(tipo_tecla_mascara_control) {
		eval(tipo_tecla_mascara_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, mostrar) {
		
		if(mostrar==true) {
			tipo_tecla_mascara_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_tecla_mascara_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(false,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(tipo_tecla_mascara_control) {
	
		funcionGeneral.printWebPartPage("tipo_tecla_mascara",tipo_tecla_mascara_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliartipo_tecla_mascarasAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("tipo_tecla_mascara",jQuery("#divTablaDatosReporteAuxiliartipo_tecla_mascarasAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(tipo_tecla_mascara_control) {
		this.tipo_tecla_mascara_controlInicial=tipo_tecla_mascara_control;
			
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_tecla_mascara_control.strStyleDivArbol,tipo_tecla_mascara_control.strStyleDivContent
																,tipo_tecla_mascara_control.strStyleDivOpcionesBanner,tipo_tecla_mascara_control.strStyleDivExpandirColapsar
																,tipo_tecla_mascara_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_tecla_mascara_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_tecla_mascara_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(tipo_tecla_mascara_control) {
		jQuery("#divTablaDatostipo_tecla_mascarasAjaxWebPart").html(tipo_tecla_mascara_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_tecla_mascaras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_tecla_mascaras=jQuery("#tblTablaDatostipo_tecla_mascaras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_tecla_mascara",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_tecla_mascara_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_tecla_mascara_webcontrol1.registrarControlesTableEdition(tipo_tecla_mascara_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_tecla_mascara_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(tipo_tecla_mascara_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_tecla_mascara_control.tipo_tecla_mascaraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_tecla_mascara_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control) {
		this.actualizarCssBotonesPagina(tipo_tecla_mascara_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_tecla_mascara_control.tiposReportes,tipo_tecla_mascara_control.tiposReporte
															 	,tipo_tecla_mascara_control.tiposPaginacion,tipo_tecla_mascara_control.tiposAcciones
																,tipo_tecla_mascara_control.tiposColumnasSelect,tipo_tecla_mascara_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_tecla_mascara_control);			
	}
	
	actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control) {
		jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_tecla_mascara_control.htmlTablaOrderBy!=null
			&& tipo_tecla_mascara_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_tecla_mascara_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_tecla_mascara_control.htmlTablaOrderByRel!=null
			&& tipo_tecla_mascara_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display","none");
			jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_tecla_mascara").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control) {
		jQuery("#tdtipo_tecla_mascaraNuevo").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
		jQuery("#trtipo_tecla_mascaraElementos").css("display",tipo_tecla_mascara_control.strVisibleTablaElementos);
		jQuery("#trtipo_tecla_mascaraAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
		jQuery("#trtipo_tecla_mascaraParametrosAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_tecla_mascara_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_tecla_mascara_control);
				
		if(tipo_tecla_mascara_control.tipo_tecla_mascaraActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_tecla_mascara_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_tecla_mascara_control);
	}
	
	actualizarPaginaUsuarioInvitado(tipo_tecla_mascara_control) {
	
		var indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_tecla_mascara_control) {
		jQuery("#divResumentipo_tecla_mascaraActualAjaxWebPart").html(tipo_tecla_mascara_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_tecla_mascara_control) {
		jQuery("#divAccionesRelacionestipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaAccionesRelaciones);
			
		tipo_tecla_mascara_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_tecla_mascara_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_tecla_mascara_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_tecla_mascara();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_tecla_mascara",id,"seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);		
	}
	
	
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_tecla_mascara_control) {
	
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-id").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.id);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-version_row").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.versionRow);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-codigo").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.codigo);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-nombre").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_tecla_mascara_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_tecla_mascara","seguridad","","form_tipo_tecla_mascara",formulario,"","",paraEventoTabla,idFilaTabla,tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	cargarCombosFK(tipo_tecla_mascara_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_tecla_mascara_control.strRecargarFkTiposNinguno!=null && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
	actualizarSpanMensajesCampos(tipo_tecla_mascara_control) {
		jQuery("#spanstrMensajeid").text(tipo_tecla_mascara_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_tecla_mascara_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_tecla_mascara_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_tecla_mascara_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_tecla_mascara_control) {
		jQuery("#tdbtnNuevotipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaCancelar);						
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

	actualizarCamposFilaTabla(tipo_tecla_mascara_control) {
		var i=0;
		
		i=tipo_tecla_mascara_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_tecla_mascara_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_funcion1.registrarControlesTableValidacionEdition(tipo_tecla_mascara_control,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascaraConstante,strParametros);
		
		//tipo_tecla_mascara_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_tecla_mascara_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_tecla_mascara");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_tecla_mascara");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_tecla_mascara_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
			
			if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,"tipo_tecla_mascara");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
		
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			
			
			
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			tipo_tecla_mascara_funcion1.validarFormularioJQuery(tipo_tecla_mascara_constante1);
			
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_tecla_mascara_control) {
		
		jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_tecla_mascara").attr("style",tipo_tecla_mascara_control.strPermisoMostrarTodos);
		
		if(tipo_tecla_mascara_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_tecla_mascaraNuevo").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
			jQuery("#tdtipo_tecla_mascaraNuevoToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_tecla_mascaraDuplicar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraDuplicarToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraNuevoGuardarCambios").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
			jQuery("#tdtipo_tecla_mascaraNuevoGuardarCambiosToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_tecla_mascara_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_tecla_mascaraActualizarToolBar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraCopiar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraCopiarToolBar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraConEditar").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_tecla_mascaraEliminarToolBar").css("display",tipo_tecla_mascara_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdtipo_tecla_mascaraGuardarCambios").css("display",tipo_tecla_mascara_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_tecla_mascaraGuardarCambiosToolBar").css("display",tipo_tecla_mascara_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trtipo_tecla_mascaraElementos").css("display",tipo_tecla_mascara_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_tecla_mascaraAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
		jQuery("#trtipo_tecla_mascaraParametrosAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
			
		jQuery("#tdtipo_tecla_mascaraCerrarPagina").css("display",tipo_tecla_mascara_control.strPermisoPopup);		
		jQuery("#tdtipo_tecla_mascaraCerrarPaginaToolBar").css("display",tipo_tecla_mascara_control.strPermisoPopup);
		//jQuery("#trtipo_tecla_mascaraAccionesRelaciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarEventosControles();
		
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			tipo_tecla_mascara_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_tecla_mascara_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_tecla_mascara_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_tecla_mascara_webcontrol1.onLoad();
				
			} else {
				if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
					if(tipo_tecla_mascara_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
						//tipo_tecla_mascara_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(tipo_tecla_mascara_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_tecla_mascara_constante1.BIG_ID_ACTUAL,"tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
						//tipo_tecla_mascara_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			tipo_tecla_mascara_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var tipo_tecla_mascara_webcontrol1=new tipo_tecla_mascara_webcontrol();

if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_tecla_mascara_webcontrol1.onLoadWindow; 
}

//</script>