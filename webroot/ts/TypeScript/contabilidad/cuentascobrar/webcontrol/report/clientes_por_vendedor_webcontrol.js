<script type="text/javascript" language="javascript">



//var clientes_por_vendedorJQueryPaginaWebInteraccion= function (clientes_por_vendedor_control) {
//this.,this.,this.

class clientes_por_vendedor_webcontrol extends clientes_por_vendedor_webcontrol_add {
	
	clientes_por_vendedor_control=null;
	clientes_por_vendedor_controlInicial=null;
	clientes_por_vendedor_controlAuxiliar=null;
		
	//if(clientes_por_vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(clientes_por_vendedor_control) {
		super();
		
		this.clientes_por_vendedor_control=clientes_por_vendedor_control;
	}
		
	actualizarVariablesPagina(clientes_por_vendedor_control) {
		
		if(clientes_por_vendedor_control.action=="index" || clientes_por_vendedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(clientes_por_vendedor_control);
			
		} 
		
		
		else if(clientes_por_vendedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(clientes_por_vendedor_control);
			
		} else if(clientes_por_vendedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(clientes_por_vendedor_control);
			
		} else if(clientes_por_vendedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(clientes_por_vendedor_control);		
		
		} else if(clientes_por_vendedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(clientes_por_vendedor_control);
		
		}  else if(clientes_por_vendedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clientes_por_vendedor_control);		
		
		} else if(clientes_por_vendedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(clientes_por_vendedor_control);		
		
		} else if(clientes_por_vendedor_control.action.includes("Busqueda") ||
				  clientes_por_vendedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(clientes_por_vendedor_control);
			
		} else if(clientes_por_vendedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(clientes_por_vendedor_control)
		}
		
		
		
	
		else if(clientes_por_vendedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(clientes_por_vendedor_control);	
		
		} else if(clientes_por_vendedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(clientes_por_vendedor_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + clientes_por_vendedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(clientes_por_vendedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(clientes_por_vendedor_control) {
		this.actualizarPaginaAccionesGenerales(clientes_por_vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(clientes_por_vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(clientes_por_vendedor_control);
		this.actualizarPaginaOrderBy(clientes_por_vendedor_control);
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		this.actualizarPaginaCargaGeneralControles(clientes_por_vendedor_control);
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clientes_por_vendedor_control);
		this.actualizarPaginaAreaBusquedas(clientes_por_vendedor_control);
		this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(clientes_por_vendedor_control) {
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(clientes_por_vendedor_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(clientes_por_vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(clientes_por_vendedor_control);
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		this.actualizarPaginaCargaGeneralControles(clientes_por_vendedor_control);
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clientes_por_vendedor_control);
		this.actualizarPaginaAreaBusquedas(clientes_por_vendedor_control);
		this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(clientes_por_vendedor_control) {
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clientes_por_vendedor_control) {
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);				
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(clientes_por_vendedor_control) {
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		this.onLoadCombosDefectoFK(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		//this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		this.onLoadCombosDefectoFK(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clientes_por_vendedor_control) {
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(clientes_por_vendedor_control) {
					//super.actualizarPaginaImprimir(clientes_por_vendedor_control,"clientes_por_vendedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clientes_por_vendedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("clientes_por_vendedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(clientes_por_vendedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clientes_por_vendedor_control) {
		//super.actualizarPaginaImprimir(clientes_por_vendedor_control,"clientes_por_vendedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("clientes_por_vendedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(clientes_por_vendedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clientes_por_vendedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(clientes_por_vendedor_control) {
		//super.actualizarPaginaImprimir(clientes_por_vendedor_control,"clientes_por_vendedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("clientes_por_vendedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(clientes_por_vendedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clientes_por_vendedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(clientes_por_vendedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(clientes_por_vendedor_control);
			
		this.actualizarPaginaAbrirLink(clientes_por_vendedor_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(clientes_por_vendedor_control) {
		
		if(clientes_por_vendedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(clientes_por_vendedor_control);
		}
		
		if(clientes_por_vendedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(clientes_por_vendedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(clientes_por_vendedor_control) {
		if(clientes_por_vendedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("clientes_por_vendedorReturnGeneral",JSON.stringify(clientes_por_vendedor_control.clientes_por_vendedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control) {
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && clientes_por_vendedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(clientes_por_vendedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(clientes_por_vendedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(clientes_por_vendedor_control, mostrar) {
		
		if(mostrar==true) {
			clientes_por_vendedor_funcion1.resaltarRestaurarDivsPagina(false,"clientes_por_vendedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				clientes_por_vendedor_funcion1.resaltarRestaurarDivMantenimiento(false,"clientes_por_vendedor");
			}			
			
			clientes_por_vendedor_funcion1.mostrarDivMensaje(true,clientes_por_vendedor_control.strAuxiliarMensaje,clientes_por_vendedor_control.strAuxiliarCssMensaje);
		
		} else {
			clientes_por_vendedor_funcion1.mostrarDivMensaje(false,clientes_por_vendedor_control.strAuxiliarMensaje,clientes_por_vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(clientes_por_vendedor_control) {
		if(clientes_por_vendedor_funcion1.esPaginaForm(clientes_por_vendedor_constante1)==true) {
			window.opener.clientes_por_vendedor_webcontrol1.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		} else {
			this.actualizarPaginaTablaDatos(clientes_por_vendedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(clientes_por_vendedor_control) {
		clientes_por_vendedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(clientes_por_vendedor_control.strAuxiliarUrlPagina);
				
		clientes_por_vendedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(clientes_por_vendedor_control.strAuxiliarTipo,clientes_por_vendedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(clientes_por_vendedor_control) {
		clientes_por_vendedor_funcion1.resaltarRestaurarDivMensaje(true,clientes_por_vendedor_control.strAuxiliarMensajeAlert,clientes_por_vendedor_control.strAuxiliarCssMensaje);
			
		if(clientes_por_vendedor_funcion1.esPaginaForm(clientes_por_vendedor_constante1)==true) {
			window.opener.clientes_por_vendedor_funcion1.resaltarRestaurarDivMensaje(true,clientes_por_vendedor_control.strAuxiliarMensajeAlert,clientes_por_vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(clientes_por_vendedor_control) {
		this.clientes_por_vendedor_controlInicial=clientes_por_vendedor_control;
			
		if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(clientes_por_vendedor_control.strStyleDivArbol,clientes_por_vendedor_control.strStyleDivContent
																,clientes_por_vendedor_control.strStyleDivOpcionesBanner,clientes_por_vendedor_control.strStyleDivExpandirColapsar
																,clientes_por_vendedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=clientes_por_vendedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",clientes_por_vendedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(clientes_por_vendedor_control) {
		this.actualizarCssBotonesPagina(clientes_por_vendedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(clientes_por_vendedor_control.tiposReportes,clientes_por_vendedor_control.tiposReporte
															 	,clientes_por_vendedor_control.tiposPaginacion,clientes_por_vendedor_control.tiposAcciones
																,clientes_por_vendedor_control.tiposColumnasSelect,clientes_por_vendedor_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(clientes_por_vendedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(clientes_por_vendedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(clientes_por_vendedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(clientes_por_vendedor_control) {
	
		var indexPosition=clientes_por_vendedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=clientes_por_vendedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(clientes_por_vendedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(clientes_por_vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",clientes_por_vendedor_control.strRecargarFkTipos,",")) { 
				clientes_por_vendedor_webcontrol1.cargarCombosvendedorsFK(clientes_por_vendedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(clientes_por_vendedor_control.strRecargarFkTiposNinguno!=null && clientes_por_vendedor_control.strRecargarFkTiposNinguno!='NINGUNO' && clientes_por_vendedor_control.strRecargarFkTiposNinguno!='') {
			
				if(clientes_por_vendedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",clientes_por_vendedor_control.strRecargarFkTiposNinguno,",")) { 
					clientes_por_vendedor_webcontrol1.cargarCombosvendedorsFK(clientes_por_vendedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablavendedorFK(clientes_por_vendedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clientes_por_vendedor_funcion1,clientes_por_vendedor_control.vendedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(clientes_por_vendedor_control) {
		jQuery("#divBusquedaclientes_por_vendedorAjaxWebPart").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
		jQuery("#trclientes_por_vendedorCabeceraBusquedas").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(clientes_por_vendedor_control.htmlTablaOrderBy!=null
			&& clientes_por_vendedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByclientes_por_vendedorAjaxWebPart").html(clientes_por_vendedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//clientes_por_vendedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(clientes_por_vendedor_control.htmlTablaOrderByRel!=null
			&& clientes_por_vendedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelclientes_por_vendedorAjaxWebPart").html(clientes_por_vendedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaclientes_por_vendedorAjaxWebPart").css("display","none");
			jQuery("#trclientes_por_vendedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaclientes_por_vendedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(clientes_por_vendedor_control) {
		
		if(!clientes_por_vendedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(clientes_por_vendedor_control);
		} else {
			jQuery("#divTablaDatosclientes_por_vendedorsAjaxWebPart").html(clientes_por_vendedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosclientes_por_vendedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosclientes_por_vendedors=jQuery("#tblTablaDatosclientes_por_vendedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("clientes_por_vendedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',clientes_por_vendedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			clientes_por_vendedor_webcontrol1.registrarControlesTableEdition(clientes_por_vendedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		clientes_por_vendedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(clientes_por_vendedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("clientes_por_vendedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(clientes_por_vendedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosclientes_por_vendedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(clientes_por_vendedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(clientes_por_vendedor_control);
		
		const divOrderBy = document.getElementById("divOrderByclientes_por_vendedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(clientes_por_vendedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelclientes_por_vendedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(clientes_por_vendedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(clientes_por_vendedor_control.clientes_por_vendedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(clientes_por_vendedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(clientes_por_vendedor_control) {
		var i=0;
		
		i=clientes_por_vendedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(clientes_por_vendedor_control.clientes_por_vendedorActual.id);
		jQuery("#t-version_row_"+i+"").val(clientes_por_vendedor_control.clientes_por_vendedorActual.versionRow);
		
		if(clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor!=null && clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_2").val(clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(clientes_por_vendedor_control.clientes_por_vendedorActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(clientes_por_vendedor_control.clientes_por_vendedorActual.nombre_completo);
		jQuery("#t-cel_"+i+"_5").val(clientes_por_vendedor_control.clientes_por_vendedorActual.direccion);
		jQuery("#t-cel_"+i+"_6").val(clientes_por_vendedor_control.clientes_por_vendedorActual.telefono);
		jQuery("#t-cel_"+i+"_7").val(clientes_por_vendedor_control.clientes_por_vendedorActual.e_mail);
		jQuery("#t-cel_"+i+"_8").val(clientes_por_vendedor_control.clientes_por_vendedorActual.maximo_credito);
		jQuery("#t-cel_"+i+"_9").val(clientes_por_vendedor_control.clientes_por_vendedorActual.codigovendedores);
		jQuery("#t-cel_"+i+"_10").val(clientes_por_vendedor_control.clientes_por_vendedorActual.nombre);
		jQuery("#t-cel_"+i+"_11").val(clientes_por_vendedor_control.clientes_por_vendedorActual.monto);
		jQuery("#t-cel_"+i+"_12").val(clientes_por_vendedor_control.clientes_por_vendedorActual.numero);
		jQuery("#t-cel_"+i+"_13").val(clientes_por_vendedor_control.clientes_por_vendedorActual.termino);
		jQuery("#t-cel_"+i+"_14").val(clientes_por_vendedor_control.clientes_por_vendedorActual.fecha);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(clientes_por_vendedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(clientes_por_vendedor_control) {
		clientes_por_vendedor_funcion1.registrarControlesTableValidacionEdition(clientes_por_vendedor_control,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(clientes_por_vendedor_control) {
		jQuery("#divResumenclientes_por_vendedorActualAjaxWebPart").html(clientes_por_vendedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(clientes_por_vendedor_control) {
		//jQuery("#divAccionesRelacionesclientes_por_vendedorAjaxWebPart").html(clientes_por_vendedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("clientes_por_vendedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(clientes_por_vendedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesclientes_por_vendedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		clientes_por_vendedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(clientes_por_vendedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(clientes_por_vendedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(clientes_por_vendedor_control) {
		
		if(clientes_por_vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor").attr("style",clientes_por_vendedor_control.strVisibleBusquedaclientes_por_vendedor);
			jQuery("#tblstrVisible"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor").attr("style",clientes_por_vendedor_control.strVisibleBusquedaclientes_por_vendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionclientes_por_vendedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("clientes_por_vendedor",id,"cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);		
	}
	
	

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		clientes_por_vendedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("clientes_por_vendedor","vendedor","cuentascobrar","",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedorConstante,strParametros);
		
		//clientes_por_vendedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosvendedorsFK(clientes_por_vendedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor",clientes_por_vendedor_control.vendedorsFK);

		if(clientes_por_vendedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clientes_por_vendedor_control.idFilaTablaActual+"_2",clientes_por_vendedor_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor-cmbid_vendedor",clientes_por_vendedor_control.vendedorsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",clientes_por_vendedor_control.vendedorsFK);

	};

	
	
	registrarComboActionChangeCombosvendedorsFK(clientes_por_vendedor_control) {

	};

	
	
	setDefectoValorCombosvendedorsFK(clientes_por_vendedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clientes_por_vendedor_control.idvendedorDefaultFK>-1 && jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val() != clientes_por_vendedor_control.idvendedorDefaultFK) {
				jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val(clientes_por_vendedor_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor-cmbid_vendedor").val(clientes_por_vendedor_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"Busquedaclientes_por_vendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(clientes_por_vendedor_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clientes_por_vendedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//clientes_por_vendedor_control
		
	
	}
	
	onLoadCombosDefectoFK(clientes_por_vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clientes_por_vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(clientes_por_vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",clientes_por_vendedor_control.strRecargarFkTipos,",")) { 
				clientes_por_vendedor_webcontrol1.setDefectoValorCombosvendedorsFK(clientes_por_vendedor_control);
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
	onLoadCombosEventosFK(clientes_por_vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clientes_por_vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(clientes_por_vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",clientes_por_vendedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clientes_por_vendedor_webcontrol1.registrarComboActionChangeCombosvendedorsFK(clientes_por_vendedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(clientes_por_vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clientes_por_vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(clientes_por_vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(clientes_por_vendedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("clientes_por_vendedor","Busquedaclientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
		
			
			if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("clientes_por_vendedor");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("clientes_por_vendedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,"clientes_por_vendedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				clientes_por_vendedor_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(clientes_por_vendedor_control) {
		
		jQuery("#divBusquedaclientes_por_vendedorAjaxWebPart").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
		jQuery("#trclientes_por_vendedorCabeceraBusquedas").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosclientes_por_vendedor").attr("style",clientes_por_vendedor_control.strPermisoMostrarTodos);		
		
		if(clientes_por_vendedor_control.strPermisoNuevo!=null) {
			jQuery("#tdclientes_por_vendedorNuevo").css("display",clientes_por_vendedor_control.strPermisoNuevo);
			jQuery("#tdclientes_por_vendedorNuevoToolBar").css("display",clientes_por_vendedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdclientes_por_vendedorDuplicar").css("display",clientes_por_vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclientes_por_vendedorDuplicarToolBar").css("display",clientes_por_vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclientes_por_vendedorNuevoGuardarCambios").css("display",clientes_por_vendedor_control.strPermisoNuevo);
			jQuery("#tdclientes_por_vendedorNuevoGuardarCambiosToolBar").css("display",clientes_por_vendedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(clientes_por_vendedor_control.strPermisoActualizar!=null) {
			jQuery("#tdclientes_por_vendedorCopiar").css("display",clientes_por_vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclientes_por_vendedorCopiarToolBar").css("display",clientes_por_vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclientes_por_vendedorConEditar").css("display",clientes_por_vendedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdclientes_por_vendedorGuardarCambios").css("display",clientes_por_vendedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdclientes_por_vendedorGuardarCambiosToolBar").css("display",clientes_por_vendedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdclientes_por_vendedorCerrarPagina").css("display",clientes_por_vendedor_control.strPermisoPopup);		
		jQuery("#tdclientes_por_vendedorCerrarPaginaToolBar").css("display",clientes_por_vendedor_control.strPermisoPopup);
		//jQuery("#trclientes_por_vendedorAccionesRelaciones").css("display",clientes_por_vendedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=clientes_por_vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clientes_por_vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + clientes_por_vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Clientes Por Vendedores";
		sTituloBanner+=" - " + clientes_por_vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clientes_por_vendedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdclientes_por_vendedorRelacionesToolBar").css("display",clientes_por_vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosclientes_por_vendedor").css("display",clientes_por_vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		clientes_por_vendedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		clientes_por_vendedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		clientes_por_vendedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		clientes_por_vendedor_webcontrol1.registrarEventosControles();
		
		if(clientes_por_vendedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="false") {
			clientes_por_vendedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(clientes_por_vendedor_constante1.STR_ES_RELACIONES=="true") {
			if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				clientes_por_vendedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(clientes_por_vendedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				clientes_por_vendedor_webcontrol1.onLoad();
			
			//} else {
				//if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			clientes_por_vendedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);	
	}
}

var clientes_por_vendedor_webcontrol1=new clientes_por_vendedor_webcontrol();

if(clientes_por_vendedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = clientes_por_vendedor_webcontrol1.onLoadWindow; 
}

</script>