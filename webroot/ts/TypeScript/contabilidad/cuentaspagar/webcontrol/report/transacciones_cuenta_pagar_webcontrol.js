<script type="text/javascript" language="javascript">



//var transacciones_cuenta_pagarJQueryPaginaWebInteraccion= function (transacciones_cuenta_pagar_control) {
//this.,this.,this.

class transacciones_cuenta_pagar_webcontrol extends transacciones_cuenta_pagar_webcontrol_add {
	
	transacciones_cuenta_pagar_control=null;
	transacciones_cuenta_pagar_controlInicial=null;
	transacciones_cuenta_pagar_controlAuxiliar=null;
		
	//if(transacciones_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(transacciones_cuenta_pagar_control) {
		super();
		
		this.transacciones_cuenta_pagar_control=transacciones_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(transacciones_cuenta_pagar_control) {
		
		if(transacciones_cuenta_pagar_control.action=="index" || transacciones_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(transacciones_cuenta_pagar_control);
			
		} 
		
		
		else if(transacciones_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(transacciones_cuenta_pagar_control);
			
		} else if(transacciones_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(transacciones_cuenta_pagar_control);
			
		} else if(transacciones_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(transacciones_cuenta_pagar_control);		
		
		} else if(transacciones_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(transacciones_cuenta_pagar_control);
		
		}  else if(transacciones_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(transacciones_cuenta_pagar_control);
		
		} else if(transacciones_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(transacciones_cuenta_pagar_control);		
		
		} else if(transacciones_cuenta_pagar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(transacciones_cuenta_pagar_control);		
		
		} else if(transacciones_cuenta_pagar_control.action.includes("Busqueda") ||
				  transacciones_cuenta_pagar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(transacciones_cuenta_pagar_control);
			
		} else if(transacciones_cuenta_pagar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(transacciones_cuenta_pagar_control)
		}
		
		
		
	
		else if(transacciones_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_pagar_control);	
		
		} else if(transacciones_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_pagar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + transacciones_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(transacciones_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(transacciones_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(transacciones_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(transacciones_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(transacciones_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_pagar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(transacciones_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(transacciones_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(transacciones_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(transacciones_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);				
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(transacciones_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(transacciones_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(transacciones_cuenta_pagar_control) {
					//super.actualizarPaginaImprimir(transacciones_cuenta_pagar_control,"transacciones_cuenta_pagar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_pagar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("transacciones_cuenta_pagar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(transacciones_cuenta_pagar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(transacciones_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(transacciones_cuenta_pagar_control,"transacciones_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("transacciones_cuenta_pagar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(transacciones_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(transacciones_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(transacciones_cuenta_pagar_control,"transacciones_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("transacciones_cuenta_pagar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(transacciones_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(transacciones_cuenta_pagar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(transacciones_cuenta_pagar_control);
			
		this.actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(transacciones_cuenta_pagar_control) {
		
		if(transacciones_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(transacciones_cuenta_pagar_control);
		}
		
		if(transacciones_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(transacciones_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(transacciones_cuenta_pagar_control) {
		if(transacciones_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("transacciones_cuenta_pagarReturnGeneral",JSON.stringify(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_pagar_control) {
		if(transacciones_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && transacciones_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(transacciones_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			transacciones_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"transacciones_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				transacciones_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta_pagar");
			}			
			
			transacciones_cuenta_pagar_funcion1.mostrarDivMensaje(true,transacciones_cuenta_pagar_control.strAuxiliarMensaje,transacciones_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			transacciones_cuenta_pagar_funcion1.mostrarDivMensaje(false,transacciones_cuenta_pagar_control.strAuxiliarMensaje,transacciones_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_pagar_control) {
		if(transacciones_cuenta_pagar_funcion1.esPaginaForm(transacciones_cuenta_pagar_constante1)==true) {
			window.opener.transacciones_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(transacciones_cuenta_pagar_control) {
		transacciones_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(transacciones_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		transacciones_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(transacciones_cuenta_pagar_control.strAuxiliarTipo,transacciones_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(transacciones_cuenta_pagar_control) {
		transacciones_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_pagar_control.strAuxiliarMensajeAlert,transacciones_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(transacciones_cuenta_pagar_funcion1.esPaginaForm(transacciones_cuenta_pagar_constante1)==true) {
			window.opener.transacciones_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_pagar_control.strAuxiliarMensajeAlert,transacciones_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(transacciones_cuenta_pagar_control) {
		this.transacciones_cuenta_pagar_controlInicial=transacciones_cuenta_pagar_control;
			
		if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(transacciones_cuenta_pagar_control.strStyleDivArbol,transacciones_cuenta_pagar_control.strStyleDivContent
																,transacciones_cuenta_pagar_control.strStyleDivOpcionesBanner,transacciones_cuenta_pagar_control.strStyleDivExpandirColapsar
																,transacciones_cuenta_pagar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=transacciones_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",transacciones_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(transacciones_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(transacciones_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(transacciones_cuenta_pagar_control.tiposReportes,transacciones_cuenta_pagar_control.tiposReporte
															 	,transacciones_cuenta_pagar_control.tiposPaginacion,transacciones_cuenta_pagar_control.tiposAcciones
																,transacciones_cuenta_pagar_control.tiposColumnasSelect,transacciones_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(transacciones_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(transacciones_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(transacciones_cuenta_pagar_control) {
	
		var indexPosition=transacciones_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=transacciones_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(transacciones_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_pagar_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_pagar_control);
			}

			if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(transacciones_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_pagar_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_pagar_control);
				}

				if(transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(transacciones_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(transacciones_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(transacciones_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(transacciones_cuenta_pagar_control) {
		jQuery("#divBusquedatransacciones_cuenta_pagarAjaxWebPart").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trtransacciones_cuenta_pagarCabeceraBusquedas").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedatransacciones_cuenta_pagar").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(transacciones_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& transacciones_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytransacciones_cuenta_pagarAjaxWebPart").html(transacciones_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//transacciones_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(transacciones_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& transacciones_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltransacciones_cuenta_pagarAjaxWebPart").html(transacciones_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatransacciones_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trtransacciones_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatransacciones_cuenta_pagar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(transacciones_cuenta_pagar_control) {
		
		if(!transacciones_cuenta_pagar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(transacciones_cuenta_pagar_control);
		} else {
			jQuery("#divTablaDatostransacciones_cuenta_pagarsAjaxWebPart").html(transacciones_cuenta_pagar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostransacciones_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostransacciones_cuenta_pagars=jQuery("#tblTablaDatostransacciones_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("transacciones_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',transacciones_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			transacciones_cuenta_pagar_webcontrol1.registrarControlesTableEdition(transacciones_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		transacciones_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(transacciones_cuenta_pagar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("transacciones_cuenta_pagar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(transacciones_cuenta_pagar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostransacciones_cuenta_pagarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(transacciones_cuenta_pagar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(transacciones_cuenta_pagar_control);
		
		const divOrderBy = document.getElementById("divOrderBytransacciones_cuenta_pagarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(transacciones_cuenta_pagar_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltransacciones_cuenta_pagarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(transacciones_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(transacciones_cuenta_pagar_control);			
		}
	}
	
	actualizarCamposFilaTabla(transacciones_cuenta_pagar_control) {
		var i=0;
		
		i=transacciones_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.versionRow);
		
		if(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_empresa!=null && transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_sucursal!=null && transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.numero_cuenta);
		jQuery("#t-cel_"+i+"_5").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.proveedor);
		jQuery("#t-cel_"+i+"_6").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.tipo);
		jQuery("#t-cel_"+i+"_7").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_8").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.debito);
		jQuery("#t-cel_"+i+"_9").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.credito);
		jQuery("#t-cel_"+i+"_10").val(transacciones_cuenta_pagar_control.transacciones_cuenta_pagarActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(transacciones_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(transacciones_cuenta_pagar_control) {
		transacciones_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(transacciones_cuenta_pagar_control,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(transacciones_cuenta_pagar_control) {
		jQuery("#divResumentransacciones_cuenta_pagarActualAjaxWebPart").html(transacciones_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(transacciones_cuenta_pagar_control) {
		//jQuery("#divAccionesRelacionestransacciones_cuenta_pagarAjaxWebPart").html(transacciones_cuenta_pagar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("transacciones_cuenta_pagar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(transacciones_cuenta_pagar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestransacciones_cuenta_pagarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		transacciones_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(transacciones_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(transacciones_cuenta_pagar_control) {
		
		if(transacciones_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta_pagar").attr("style",transacciones_cuenta_pagar_control.strVisibleBusquedatransacciones_cuenta_pagar);
			jQuery("#tblstrVisible"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta_pagar").attr("style",transacciones_cuenta_pagar_control.strVisibleBusquedatransacciones_cuenta_pagar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontransacciones_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("transacciones_cuenta_pagar",id,"cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		transacciones_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("transacciones_cuenta_pagar","empresa","cuentaspagar","",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		transacciones_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("transacciones_cuenta_pagar","sucursal","cuentaspagar","",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagarConstante,strParametros);
		
		//transacciones_cuenta_pagar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(transacciones_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",transacciones_cuenta_pagar_control.empresasFK);

		if(transacciones_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_pagar_control.idFilaTablaActual+"_2",transacciones_cuenta_pagar_control.empresasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa",transacciones_cuenta_pagar_control.empresasFK);

	};

	cargarCombossucursalsFK(transacciones_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",transacciones_cuenta_pagar_control.sucursalsFK);

		if(transacciones_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_pagar_control.idFilaTablaActual+"_3",transacciones_cuenta_pagar_control.sucursalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal",transacciones_cuenta_pagar_control.sucursalsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(transacciones_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(transacciones_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(transacciones_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != transacciones_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(transacciones_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(transacciones_cuenta_pagar_control.idempresaDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(transacciones_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != transacciones_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(transacciones_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(transacciones_cuenta_pagar_control.idsucursalDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//transacciones_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(transacciones_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(transacciones_cuenta_pagar_control);
			}

			if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(transacciones_cuenta_pagar_control);
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
	onLoadCombosEventosFK(transacciones_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(transacciones_cuenta_pagar_control);
			//}

			//if(transacciones_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(transacciones_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(transacciones_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(transacciones_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("transacciones_cuenta_pagar","Busquedatransacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
		
			
			if(transacciones_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("transacciones_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("transacciones_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,"transacciones_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				transacciones_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				transacciones_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(transacciones_cuenta_pagar_control) {
		
		jQuery("#divBusquedatransacciones_cuenta_pagarAjaxWebPart").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trtransacciones_cuenta_pagarCabeceraBusquedas").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedatransacciones_cuenta_pagar").css("display",transacciones_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetransacciones_cuenta_pagar").css("display",transacciones_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostransacciones_cuenta_pagar").attr("style",transacciones_cuenta_pagar_control.strPermisoMostrarTodos);		
		
		if(transacciones_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tdtransacciones_cuenta_pagarNuevo").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdtransacciones_cuenta_pagarNuevoToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtransacciones_cuenta_pagarDuplicar").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtransacciones_cuenta_pagarDuplicarToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtransacciones_cuenta_pagarNuevoGuardarCambios").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdtransacciones_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(transacciones_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdtransacciones_cuenta_pagarCopiar").css("display",transacciones_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtransacciones_cuenta_pagarCopiarToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtransacciones_cuenta_pagarConEditar").css("display",transacciones_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tdtransacciones_cuenta_pagarGuardarCambios").css("display",transacciones_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtransacciones_cuenta_pagarGuardarCambiosToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtransacciones_cuenta_pagarCerrarPagina").css("display",transacciones_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdtransacciones_cuenta_pagarCerrarPaginaToolBar").css("display",transacciones_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trtransacciones_cuenta_pagarAccionesRelaciones").css("display",transacciones_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=transacciones_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + transacciones_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Transacciones Cuentas";
		sTituloBanner+=" - " + transacciones_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtransacciones_cuenta_pagarRelacionesToolBar").css("display",transacciones_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostransacciones_cuenta_pagar").css("display",transacciones_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		transacciones_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		transacciones_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(transacciones_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			transacciones_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(transacciones_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				transacciones_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(transacciones_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(transacciones_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				transacciones_cuenta_pagar_webcontrol1.onLoad();
			
			//} else {
				//if(transacciones_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			transacciones_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("transacciones_cuenta_pagar","cuentaspagar","report",transacciones_cuenta_pagar_funcion1,transacciones_cuenta_pagar_webcontrol1,transacciones_cuenta_pagar_constante1);	
	}
}

var transacciones_cuenta_pagar_webcontrol1=new transacciones_cuenta_pagar_webcontrol();

if(transacciones_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = transacciones_cuenta_pagar_webcontrol1.onLoadWindow; 
}

</script>