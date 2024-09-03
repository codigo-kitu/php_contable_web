//<script type="text/javascript" language="javascript">



//var producto_equivalenteJQueryPaginaWebInteraccion= function (producto_equivalente_control) {
//this.,this.,this.

class producto_equivalente_webcontrol extends producto_equivalente_webcontrol_add {
	
	producto_equivalente_control=null;
	producto_equivalente_controlInicial=null;
	producto_equivalente_controlAuxiliar=null;
		
	//if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_equivalente_control) {
		super();
		
		this.producto_equivalente_control=producto_equivalente_control;
	}
		
	actualizarVariablesPagina(producto_equivalente_control) {
		
		if(producto_equivalente_control.action=="index" || producto_equivalente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="recargarFomularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control);		
		}
		else if(producto_equivalente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control);		
		}
		else if(producto_equivalente_control.action=="recargarFormularioGeneralFk") {
			this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_equivalente_control);		
		}
		else if(producto_equivalente_control.action=="abrirArbol") {
			this.actualizarVariablesPaginaAccionAbrirArbol(producto_equivalente_control);
		}
		else if(producto_equivalente_control.action=="cargarArbol") {
			this.actualizarVariablesPaginaAccionCargarArbol(producto_equivalente_control);
		}
		else if(producto_equivalente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control);
		}
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(producto_equivalente_control.action + " Revisar Manejo");
			
			if(producto_equivalente_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(producto_equivalente_control);
				
				return;
			}
			
			//if(producto_equivalente_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(producto_equivalente_control);
			//}
			
			if(producto_equivalente_control.bitEsEjecutarFuncionJavaScript==true){
				this.actualizarPaginaEjecutarJavaScript(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_equivalente_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(producto_equivalente_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(producto_equivalente_control, false);			
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(producto_equivalente_control);	
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(producto_equivalente_control);	
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(producto_equivalente_control);
			}
			
			
			if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(producto_equivalente_control);			
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				this.actualizarPaginaImprimir(producto_equivalente_control);
			}
			
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(producto_equivalente_control);
			}				
			
			if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control);
			}
			
			if(producto_equivalente_control.usuarioActual!=null && producto_equivalente_control.usuarioActual.field_strUserName!=null &&
			producto_equivalente_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(producto_equivalente_control);			
			}
		}
		
		
		if(producto_equivalente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_equivalente_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(producto_equivalente_control) {
		
		this.actualizarPaginaCargaGeneral(producto_equivalente_control);
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
		this.actualizarPaginaAreaBusquedas(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);	
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_equivalente_control) {
		
		this.actualizarPaginaCargaGeneral(producto_equivalente_control);
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
		this.actualizarPaginaAreaBusquedas(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevo(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_equivalente_control) {
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(producto_equivalente_control) {
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);				
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(producto_equivalente_control) {
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_equivalente_control) {
		this.actualizarPaginaImprimir(producto_equivalente_control);
	}
	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_equivalente_control) {
		this.actualizarPaginaImprimir(producto_equivalente_control);
	}	
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control) {
		
	}
	
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);
			this.actualizarPaginaFormularioAdd(producto_equivalente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	
	actualizarVariablesPaginaAccionManejarEventos(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);	
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);			
		}
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_equivalente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);	
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	
	actualizarVariablesPaginaAccionAbrirArbol(producto_equivalente_control) {
		
	}
	
	actualizarVariablesPaginaAccionCargarArbol(producto_equivalente_control) {
		
	}
	
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control);
	}
	
//Funciones Auxiliares
	actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_equivalente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_funcion1.esPaginaForm()==true) {
			window.opener.producto_equivalente_webcontrol1.actualizarPaginaTablaDatos(producto_equivalente_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_equivalente_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_equivalente_control) {
		producto_equivalente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_equivalente_control.strAuxiliarUrlPagina);
				
		producto_equivalente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_equivalente_control.strAuxiliarTipo,producto_equivalente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_equivalente_control) {
		producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
			
		if(producto_equivalente_funcion1.esPaginaForm()==true) {
			window.opener.producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaEjecutarJavaScript(producto_equivalente_control) {
		eval(producto_equivalente_control.strFuncionJs);
	}
	
	actualizarPaginaMensajePantalla(producto_equivalente_control, mostrar) {
		
		if(mostrar==true) {
			producto_equivalente_funcion1.resaltarRestaurarDivsPagina(false);
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_equivalente_funcion1.resaltarRestaurarDivMantenimiento(false);
			}			
			
			producto_equivalente_funcion1.mostrarDivMensaje(true,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		
		} else {
			producto_equivalente_funcion1.mostrarDivMensaje(false,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaImprimir(producto_equivalente_control) {
	
		funcionGeneral.printWebPartPage("producto_equivalente",producto_equivalente_control.htmlTablaReporteAuxiliars);			
			
		//jQuery("#divTablaDatosReporteAuxiliarproducto_equivalentesAjaxWebPart").html(producto_equivalente_control.htmlTablaReporteAuxiliars);						
		//funcionGeneral.printWebPartPage("producto_equivalente",jQuery("#divTablaDatosReporteAuxiliarproducto_equivalentesAjaxWebPart").html());			
	}
	
	actualizarPaginaCargaGeneral(producto_equivalente_control) {
		this.producto_equivalente_controlInicial=producto_equivalente_control;
			
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_equivalente_control.strStyleDivArbol,producto_equivalente_control.strStyleDivContent
																,producto_equivalente_control.strStyleDivOpcionesBanner,producto_equivalente_control.strStyleDivExpandirColapsar
																,producto_equivalente_control.strStyleDivHeader);
				
			if(jQuery("#divRecargarInformacion").attr("style")!=producto_equivalente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",producto_equivalente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	
	actualizarPaginaTablaDatos(producto_equivalente_control) {
		jQuery("#divTablaDatosproducto_equivalentesAjaxWebPart").html(producto_equivalente_control.htmlTabla);						
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproducto_equivalentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproducto_equivalentes=jQuery("#tblTablaDatosproducto_equivalentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("producto_equivalente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',producto_equivalente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			producto_equivalente_webcontrol1.registrarControlesTableEdition(producto_equivalente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		producto_equivalente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaFilaActual(producto_equivalente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(producto_equivalente_control.producto_equivalenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(producto_equivalente_control);			
		}
	}
	
	actualizarPaginaCargaGeneralControles(producto_equivalente_control) {
		this.actualizarCssBotonesPagina(producto_equivalente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_equivalente_control.tiposReportes,producto_equivalente_control.tiposReporte
															 	,producto_equivalente_control.tiposPaginacion,producto_equivalente_control.tiposAcciones
																,producto_equivalente_control.tiposColumnasSelect,producto_equivalente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(producto_equivalente_control.tiposRelaciones,producto_equivalente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_equivalente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_equivalente_control);			
	}
	
	actualizarPaginaAreaBusquedas(producto_equivalente_control) {
		jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_equivalente").css("display",producto_equivalente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(producto_equivalente_control.htmlTablaOrderBy!=null
			&& producto_equivalente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//producto_equivalente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(producto_equivalente_control.htmlTablaOrderByRel!=null
			&& producto_equivalente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display","none");
			jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproducto_equivalente").css("display","none");			
		}
	}
	
	actualizarPaginaAreaMantenimiento(producto_equivalente_control) {
		jQuery("#tdproducto_equivalenteNuevo").css("display",producto_equivalente_control.strPermisoNuevo);
		jQuery("#trproducto_equivalenteElementos").css("display",producto_equivalente_control.strVisibleTablaElementos);
		jQuery("#trproducto_equivalenteAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
		jQuery("#trproducto_equivalenteParametrosAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(producto_equivalente_control) {
	
		this.actualizarCssBotonesMantenimiento(producto_equivalente_control);
				
		if(producto_equivalente_control.producto_equivalenteActual!=null) {//form
			
			this.actualizarCamposFormulario(producto_equivalente_control);			
		}
						
		this.actualizarSpanMensajesCampos(producto_equivalente_control);
	}
	
	actualizarPaginaUsuarioInvitado(producto_equivalente_control) {
	
		var indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	actualizarPaginaAreaAuxiliarResumen(producto_equivalente_control) {
		jQuery("#divResumenproducto_equivalenteActualAjaxWebPart").html(producto_equivalente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control) {
		jQuery("#divAccionesRelacionesproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaAccionesRelaciones);
			
		producto_equivalente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(producto_equivalente_control);
	}
	
/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(producto_equivalente_control) {
		
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_equivalente);
			jQuery("#tblstrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_equivalente);
		}

		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_principal);
			jQuery("#tblstrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_principal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproducto_equivalente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("producto_equivalente",id,"inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		producto_equivalente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_equivalente","producto","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}

	abrirBusquedaParaproducto_equivalente(strNombreCampoBusqueda){//idActual
		producto_equivalente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_equivalente","producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	
/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(producto_equivalente_control) {
	
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id").val(producto_equivalente_control.producto_equivalenteActual.id);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-version_row").val(producto_equivalente_control.producto_equivalenteActual.versionRow);
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_principal!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_principal>-1){
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_principal) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(producto_equivalente_control.producto_equivalenteActual.id_producto_principal).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").select2("val", null);
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente>-1){
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").select2("val", null);
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-producto_id_principal").val(producto_equivalente_control.producto_equivalenteActual.producto_id_principal);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-producto_id_equivalente").val(producto_equivalente_control.producto_equivalenteActual.producto_id_equivalente);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-comentario").val(producto_equivalente_control.producto_equivalenteActual.comentario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+producto_equivalente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("producto_equivalente","inventario","","form_producto_equivalente",formulario,"","",paraEventoTabla,idFilaTabla,producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	cargarCombosFK(producto_equivalente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_equivalente_control.strRecargarFkTiposNinguno!=null && producto_equivalente_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_equivalente_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
				}

				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
				}

		}
	}
	
	actualizarSpanMensajesCampos(producto_equivalente_control) {
		jQuery("#spanstrMensajeid").text(producto_equivalente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(producto_equivalente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto_principal").text(producto_equivalente_control.strMensajeid_producto_principal);		
		jQuery("#spanstrMensajeid_producto_equivalente").text(producto_equivalente_control.strMensajeid_producto_equivalente);		
		jQuery("#spanstrMensajeproducto_id_principal").text(producto_equivalente_control.strMensajeproducto_id_principal);		
		jQuery("#spanstrMensajeproducto_id_equivalente").text(producto_equivalente_control.strMensajeproducto_id_equivalente);		
		jQuery("#spanstrMensajecomentario").text(producto_equivalente_control.strMensajecomentario);		
	}
	
	actualizarCssBotonesMantenimiento(producto_equivalente_control) {
		jQuery("#tdbtnNuevoproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproducto_equivalente").css("display",producto_equivalente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproducto_equivalente").css("display",producto_equivalente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproducto_equivalente").css("display",producto_equivalente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproducto_equivalente").css("display",producto_equivalente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto_equivalente").click(function(){

			var idActual=jQuery(this).attr("idactualproducto_equivalente");

			producto_equivalente_webcontrol1.registrarSesionParaproducto_equivalentes(idActual);
		});
		
	}		
	
	//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproducto_principalFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_principalsFK);
	}

	cargarComboEditarTablaproducto_equivalenteFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_equivalentesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	
/*---------------------------------- AREA:TABLA ---------------------------*/

	actualizarCamposFilaTabla(producto_equivalente_control) {
		var i=0;
		
		i=producto_equivalente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(producto_equivalente_control.producto_equivalenteActual.id);
		jQuery("#t-version_row_"+i+"").val(producto_equivalente_control.producto_equivalenteActual.versionRow);
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_principal!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_principal>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_principal) {
				jQuery("#t-cel_"+i+"_2").val(producto_equivalente_control.producto_equivalenteActual.id_producto_principal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente) {
				jQuery("#t-cel_"+i+"_3").val(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(producto_equivalente_control.producto_equivalenteActual.producto_id_principal);
		jQuery("#t-cel_"+i+"_5").val(producto_equivalente_control.producto_equivalenteActual.producto_id_equivalente);
		jQuery("#t-cel_"+i+"_6").val(producto_equivalente_control.producto_equivalenteActual.comentario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(producto_equivalente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_equivalente").click(function(){
		jQuery("#tblTablaDatosproducto_equivalentes").on("click",".imgrelacionproducto_equivalente", function () {

			var idActual=jQuery(this).attr("idactualproducto_equivalente");

			producto_equivalente_webcontrol1.registrarSesionParaproducto_equivalentes(idActual);
		});				
	}
		
	

	registrarSesionParaproducto_equivalentes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto_equivalente","producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,"s","");
	}
	
	registrarControlesTableEdition(producto_equivalente_control) {
		producto_equivalente_funcion1.registrarControlesTableValidacionEdition(producto_equivalente_control,producto_equivalente_webcontrol1,producto_equivalente_constante1);			
	}

/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalenteConstante,strParametros);
		
		//producto_equivalente_funcion1.cancelarOnComplete();
	}	
	
	
	cargarCombosproducto_principalsFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal",producto_equivalente_control.producto_principalsFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_2",producto_equivalente_control.producto_principalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal",producto_equivalente_control.producto_principalsFK);

	};

	cargarCombosproducto_equivalentesFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_3",producto_equivalente_control.producto_equivalentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

	};

	
	
	registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control) {

	};

	registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control) {

	};

	
	
	setDefectoValorCombosproducto_principalsFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_principalDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != producto_equivalente_control.idproducto_principalDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_equivalenteDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != producto_equivalente_control.idproducto_equivalenteDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_equivalente_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control);
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
	onLoadCombosEventosFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control);
			//}

			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
						
			funcionGeneralEventoJQuery.setBotonNuevoClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
					
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCerrarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto_equivalente");		
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonOrderByClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setToolBarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto_equivalente");
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			//COPIADO DE BOTON GENERAR REPORTE
			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(producto_equivalente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
					
			funcionGeneralEventoJQuery.setCheckConEditarChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
			if(producto_equivalente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,"producto_equivalente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto_principal","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto("id_producto_principal");
				//alert(jQuery('#form-id_producto_principal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto_equivalente","id_producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto_equivalente("id_producto_equivalente");
				//alert(jQuery('#form-id_producto_equivalente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
		

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_equivalente","FK_Idproducto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_equivalente","FK_Idproducto_principal","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			
			
			
			
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("producto_equivalente");
									
			
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			producto_equivalente_funcion1.validarFormularioJQuery(producto_equivalente_constante1);
			
			if(producto_equivalente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,window);
			}
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_equivalente_control) {
		
		jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_equivalente").css("display",producto_equivalente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproducto_equivalente").css("display",producto_equivalente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproducto_equivalente").attr("style",producto_equivalente_control.strPermisoMostrarTodos);
		
		if(producto_equivalente_control.strPermisoNuevo!=null) {
			jQuery("#tdproducto_equivalenteNuevo").css("display",producto_equivalente_control.strPermisoNuevo);
			jQuery("#tdproducto_equivalenteNuevoToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproducto_equivalenteDuplicar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_equivalenteDuplicarToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_equivalenteNuevoGuardarCambios").css("display",producto_equivalente_control.strPermisoNuevo);
			jQuery("#tdproducto_equivalenteNuevoGuardarCambiosToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(producto_equivalente_control.strPermisoActualizar!=null) {
			jQuery("#tdproducto_equivalenteActualizarToolBar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_equivalenteCopiar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_equivalenteCopiarToolBar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_equivalenteConEditar").css("display",producto_equivalente_control.strPermisoActualizar);
		}
		
		jQuery("#tdproducto_equivalenteEliminarToolBar").css("display",producto_equivalente_control.strPermisoEliminar.replace("row","cell"));
		
		jQuery("#tdproducto_equivalenteGuardarCambios").css("display",producto_equivalente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproducto_equivalenteGuardarCambiosToolBar").css("display",producto_equivalente_control.strPermisoGuardar.replace("row","cell"));
		
		jQuery("#trproducto_equivalenteElementos").css("display",producto_equivalente_control.strVisibleTablaElementos);
		
		jQuery("#trproducto_equivalenteAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
		jQuery("#trproducto_equivalenteParametrosAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
			
		jQuery("#tdproducto_equivalenteCerrarPagina").css("display",producto_equivalente_control.strPermisoPopup);		
		jQuery("#tdproducto_equivalenteCerrarPaginaToolBar").css("display",producto_equivalente_control.strPermisoPopup);
		//jQuery("#trproducto_equivalenteAccionesRelaciones").css("display",producto_equivalente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarEventosControles();
		
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			producto_equivalente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_equivalente_constante1.STR_ES_RELACIONES=="true") {
			if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_equivalente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_equivalente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			if(producto_equivalente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				producto_equivalente_webcontrol1.onLoad();
				
			} else {
				if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
					if(producto_equivalente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
						//producto_equivalente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					} else if(producto_equivalente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(producto_equivalente_constante1.BIG_ID_ACTUAL,"producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
						//producto_equivalente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				}
			}
			
		} else {
			producto_equivalente_webcontrol1.onLoad();	
		}
						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}	
		
	//}	//BitEsParaJQuery==true
}

var producto_equivalente_webcontrol1=new producto_equivalente_webcontrol();

if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_equivalente_webcontrol1.onLoadWindow; 
}

//</script>