<script type="text/javascript" language="javascript">



//var transacciones_cuentaJQueryPaginaWebInteraccion= function (transacciones_cuenta_control) {
//this.,this.,this.

class transacciones_cuenta_webcontrol extends transacciones_cuenta_webcontrol_add {
	
	transacciones_cuenta_control=null;
	transacciones_cuenta_controlInicial=null;
	transacciones_cuenta_controlAuxiliar=null;
		
	//if(transacciones_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(transacciones_cuenta_control) {
		super();
		
		this.transacciones_cuenta_control=transacciones_cuenta_control;
	}
		
	actualizarVariablesPagina(transacciones_cuenta_control) {
		
		if(transacciones_cuenta_control.action=="index" || transacciones_cuenta_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(transacciones_cuenta_control);
			
		} 
		
		
		else if(transacciones_cuenta_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(transacciones_cuenta_control);
			
		} else if(transacciones_cuenta_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(transacciones_cuenta_control);
			
		} else if(transacciones_cuenta_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(transacciones_cuenta_control);		
		
		} else if(transacciones_cuenta_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(transacciones_cuenta_control);
		
		}  else if(transacciones_cuenta_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(transacciones_cuenta_control);		
		
		} else if(transacciones_cuenta_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(transacciones_cuenta_control);		
		
		} else if(transacciones_cuenta_control.action.includes("Busqueda") ||
				  transacciones_cuenta_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(transacciones_cuenta_control);
			
		} else if(transacciones_cuenta_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(transacciones_cuenta_control)
		}
		
		
		
	
		else if(transacciones_cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_control);	
		
		} else if(transacciones_cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + transacciones_cuenta_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_control) {
		this.actualizarPaginaAccionesGenerales(transacciones_cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(transacciones_cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(transacciones_cuenta_control);
		this.actualizarPaginaOrderBy(transacciones_cuenta_control);
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_control);
		this.actualizarPaginaAreaBusquedas(transacciones_cuenta_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(transacciones_cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(transacciones_cuenta_control);
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_control);
		this.actualizarPaginaAreaBusquedas(transacciones_cuenta_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(transacciones_cuenta_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(transacciones_cuenta_control) {
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);				
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(transacciones_cuenta_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(transacciones_cuenta_control) {
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatos(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(transacciones_cuenta_control) {
					//super.actualizarPaginaImprimir(transacciones_cuenta_control,"transacciones_cuenta");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("transacciones_cuenta_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(transacciones_cuenta_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(transacciones_cuenta_control) {
		//super.actualizarPaginaImprimir(transacciones_cuenta_control,"transacciones_cuenta");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("transacciones_cuenta_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(transacciones_cuenta_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(transacciones_cuenta_control) {
		//super.actualizarPaginaImprimir(transacciones_cuenta_control,"transacciones_cuenta");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("transacciones_cuenta_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(transacciones_cuenta_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",transacciones_cuenta_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(transacciones_cuenta_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(transacciones_cuenta_control);
			
		this.actualizarPaginaAbrirLink(transacciones_cuenta_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(transacciones_cuenta_control) {
		
		if(transacciones_cuenta_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(transacciones_cuenta_control);
		}
		
		if(transacciones_cuenta_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(transacciones_cuenta_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(transacciones_cuenta_control) {
		if(transacciones_cuenta_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("transacciones_cuentaReturnGeneral",JSON.stringify(transacciones_cuenta_control.transacciones_cuentaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control) {
		if(transacciones_cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && transacciones_cuenta_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(transacciones_cuenta_control, mostrar) {
		
		if(mostrar==true) {
			transacciones_cuenta_funcion1.resaltarRestaurarDivsPagina(false,"transacciones_cuenta");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				transacciones_cuenta_funcion1.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta");
			}			
			
			transacciones_cuenta_funcion1.mostrarDivMensaje(true,transacciones_cuenta_control.strAuxiliarMensaje,transacciones_cuenta_control.strAuxiliarCssMensaje);
		
		} else {
			transacciones_cuenta_funcion1.mostrarDivMensaje(false,transacciones_cuenta_control.strAuxiliarMensaje,transacciones_cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_control) {
		if(transacciones_cuenta_funcion1.esPaginaForm(transacciones_cuenta_constante1)==true) {
			window.opener.transacciones_cuenta_webcontrol1.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		} else {
			this.actualizarPaginaTablaDatos(transacciones_cuenta_control);
		}
	}
	
	actualizarPaginaAbrirLink(transacciones_cuenta_control) {
		transacciones_cuenta_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(transacciones_cuenta_control.strAuxiliarUrlPagina);
				
		transacciones_cuenta_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(transacciones_cuenta_control.strAuxiliarTipo,transacciones_cuenta_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(transacciones_cuenta_control) {
		transacciones_cuenta_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_control.strAuxiliarMensajeAlert,transacciones_cuenta_control.strAuxiliarCssMensaje);
			
		if(transacciones_cuenta_funcion1.esPaginaForm(transacciones_cuenta_constante1)==true) {
			window.opener.transacciones_cuenta_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_control.strAuxiliarMensajeAlert,transacciones_cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(transacciones_cuenta_control) {
		this.transacciones_cuenta_controlInicial=transacciones_cuenta_control;
			
		if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(transacciones_cuenta_control.strStyleDivArbol,transacciones_cuenta_control.strStyleDivContent
																,transacciones_cuenta_control.strStyleDivOpcionesBanner,transacciones_cuenta_control.strStyleDivExpandirColapsar
																,transacciones_cuenta_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=transacciones_cuenta_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",transacciones_cuenta_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(transacciones_cuenta_control) {
		this.actualizarCssBotonesPagina(transacciones_cuenta_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(transacciones_cuenta_control.tiposReportes,transacciones_cuenta_control.tiposReporte
															 	,transacciones_cuenta_control.tiposPaginacion,transacciones_cuenta_control.tiposAcciones
																,transacciones_cuenta_control.tiposColumnasSelect,transacciones_cuenta_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(transacciones_cuenta_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(transacciones_cuenta_control);			
	}
	
	actualizarPaginaUsuarioInvitado(transacciones_cuenta_control) {
	
		var indexPosition=transacciones_cuenta_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=transacciones_cuenta_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(transacciones_cuenta_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_control);
			}

			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.cargarCombosusuariosFK(transacciones_cuenta_control);
			}

			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.cargarCombosbancosFK(transacciones_cuenta_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(transacciones_cuenta_control.strRecargarFkTiposNinguno!=null && transacciones_cuenta_control.strRecargarFkTiposNinguno!='NINGUNO' && transacciones_cuenta_control.strRecargarFkTiposNinguno!='') {
			
				if(transacciones_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_control);
				}

				if(transacciones_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",transacciones_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_webcontrol1.cargarCombosusuariosFK(transacciones_cuenta_control);
				}

				if(transacciones_cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_banco",transacciones_cuenta_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_webcontrol1.cargarCombosbancosFK(transacciones_cuenta_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(transacciones_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_funcion1,transacciones_cuenta_control.empresasFK);
	}

	cargarComboEditarTablausuarioFK(transacciones_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_funcion1,transacciones_cuenta_control.usuariosFK);
	}

	cargarComboEditarTablabancoFK(transacciones_cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_funcion1,transacciones_cuenta_control.bancosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(transacciones_cuenta_control) {
		jQuery("#divBusquedatransacciones_cuentaAjaxWebPart").css("display",transacciones_cuenta_control.strPermisoBusqueda);
		jQuery("#trtransacciones_cuentaCabeceraBusquedas").css("display",transacciones_cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedatransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(transacciones_cuenta_control.htmlTablaOrderBy!=null
			&& transacciones_cuenta_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytransacciones_cuentaAjaxWebPart").html(transacciones_cuenta_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//transacciones_cuenta_webcontrol1.registrarOrderByActions();
			
		}
			
		if(transacciones_cuenta_control.htmlTablaOrderByRel!=null
			&& transacciones_cuenta_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltransacciones_cuentaAjaxWebPart").html(transacciones_cuenta_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatransacciones_cuentaAjaxWebPart").css("display","none");
			jQuery("#trtransacciones_cuentaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatransacciones_cuenta").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(transacciones_cuenta_control) {
		
		if(!transacciones_cuenta_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(transacciones_cuenta_control);
		} else {
			jQuery("#divTablaDatostransacciones_cuentasAjaxWebPart").html(transacciones_cuenta_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostransacciones_cuentas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostransacciones_cuentas=jQuery("#tblTablaDatostransacciones_cuentas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("transacciones_cuenta",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',transacciones_cuenta_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			transacciones_cuenta_webcontrol1.registrarControlesTableEdition(transacciones_cuenta_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		transacciones_cuenta_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(transacciones_cuenta_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("transacciones_cuenta_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(transacciones_cuenta_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostransacciones_cuentasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(transacciones_cuenta_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(transacciones_cuenta_control);
		
		const divOrderBy = document.getElementById("divOrderBytransacciones_cuentaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(transacciones_cuenta_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltransacciones_cuentaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(transacciones_cuenta_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(transacciones_cuenta_control.transacciones_cuentaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(transacciones_cuenta_control);			
		}
	}
	
	actualizarCamposFilaTabla(transacciones_cuenta_control) {
		var i=0;
		
		i=transacciones_cuenta_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(transacciones_cuenta_control.transacciones_cuentaActual.id);
		jQuery("#t-version_row_"+i+"").val(transacciones_cuenta_control.transacciones_cuentaActual.versionRow);
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_empresa!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(transacciones_cuenta_control.transacciones_cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_usuario!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_3").val(transacciones_cuenta_control.transacciones_cuentaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_banco!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_banco>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_banco) {
				jQuery("#t-cel_"+i+"_4").val(transacciones_cuenta_control.transacciones_cuentaActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(transacciones_cuenta_control.transacciones_cuentaActual.numero_cuenta);
		jQuery("#t-cel_"+i+"_6").val(transacciones_cuenta_control.transacciones_cuentaActual.tipo);
		jQuery("#t-cel_"+i+"_7").val(transacciones_cuenta_control.transacciones_cuentaActual.fecha_emision);
		jQuery("#t-cel_"+i+"_8").val(transacciones_cuenta_control.transacciones_cuentaActual.debito);
		jQuery("#t-cel_"+i+"_9").val(transacciones_cuenta_control.transacciones_cuentaActual.credito);
		jQuery("#t-cel_"+i+"_10").val(transacciones_cuenta_control.transacciones_cuentaActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(transacciones_cuenta_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(transacciones_cuenta_control) {
		transacciones_cuenta_funcion1.registrarControlesTableValidacionEdition(transacciones_cuenta_control,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(transacciones_cuenta_control) {
		jQuery("#divResumentransacciones_cuentaActualAjaxWebPart").html(transacciones_cuenta_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(transacciones_cuenta_control) {
		//jQuery("#divAccionesRelacionestransacciones_cuentaAjaxWebPart").html(transacciones_cuenta_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("transacciones_cuenta_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(transacciones_cuenta_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestransacciones_cuentaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		transacciones_cuenta_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(transacciones_cuenta_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(transacciones_cuenta_control) {
		
		if(transacciones_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta").attr("style",transacciones_cuenta_control.strVisibleBusquedatransacciones_cuenta);
			jQuery("#tblstrVisible"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta").attr("style",transacciones_cuenta_control.strVisibleBusquedatransacciones_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontransacciones_cuenta();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("transacciones_cuenta",id,"cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		transacciones_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("transacciones_cuenta","empresa","cuentascorrientes","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		transacciones_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("transacciones_cuenta","usuario","cuentascorrientes","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
	}

	abrirBusquedaParabanco(strNombreCampoBusqueda){//idActual
		transacciones_cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("transacciones_cuenta","banco","cuentascorrientes","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuentaConstante,strParametros);
		
		//transacciones_cuenta_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(transacciones_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa",transacciones_cuenta_control.empresasFK);

		if(transacciones_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_control.idFilaTablaActual+"_2",transacciones_cuenta_control.empresasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa",transacciones_cuenta_control.empresasFK);

	};

	cargarCombosusuariosFK(transacciones_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario",transacciones_cuenta_control.usuariosFK);

		if(transacciones_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_control.idFilaTablaActual+"_3",transacciones_cuenta_control.usuariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario",transacciones_cuenta_control.usuariosFK);

	};

	cargarCombosbancosFK(transacciones_cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco",transacciones_cuenta_control.bancosFK);

		if(transacciones_cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_control.idFilaTablaActual+"_4",transacciones_cuenta_control.bancosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta-cmbid_banco",transacciones_cuenta_control.bancosFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco",transacciones_cuenta_control.bancosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(transacciones_cuenta_control) {

	};

	registrarComboActionChangeCombosusuariosFK(transacciones_cuenta_control) {

	};

	registrarComboActionChangeCombosbancosFK(transacciones_cuenta_control) {

	};

	
	
	setDefectoValorCombosempresasFK(transacciones_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_control.idempresaDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != transacciones_cuenta_control.idempresaDefaultFK) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(transacciones_cuenta_control.idempresaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(transacciones_cuenta_control.idempresaDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(transacciones_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_control.idusuarioDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val() != transacciones_cuenta_control.idusuarioDefaultFK) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val(transacciones_cuenta_control.idusuarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val(transacciones_cuenta_control.idusuarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbancosFK(transacciones_cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_control.idbancoDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val() != transacciones_cuenta_control.idbancoDefaultFK) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val(transacciones_cuenta_control.idbancoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta-cmbid_banco").val(transacciones_cuenta_control.idbancoDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta-cmbid_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"Busquedatransacciones_cuenta-cmbid_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(transacciones_cuenta_control.idbancoDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//transacciones_cuenta_control
		
	
	}
	
	onLoadCombosDefectoFK(transacciones_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.setDefectoValorCombosempresasFK(transacciones_cuenta_control);
			}

			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.setDefectoValorCombosusuariosFK(transacciones_cuenta_control);
			}

			if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",transacciones_cuenta_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_webcontrol1.setDefectoValorCombosbancosFK(transacciones_cuenta_control);
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
	onLoadCombosEventosFK(transacciones_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_webcontrol1.registrarComboActionChangeCombosempresasFK(transacciones_cuenta_control);
			//}

			//if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",transacciones_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_webcontrol1.registrarComboActionChangeCombosusuariosFK(transacciones_cuenta_control);
			//}

			//if(transacciones_cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",transacciones_cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_webcontrol1.registrarComboActionChangeCombosbancosFK(transacciones_cuenta_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(transacciones_cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(transacciones_cuenta_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("transacciones_cuenta","Busquedatransacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
		
			
			if(transacciones_cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("transacciones_cuenta");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("transacciones_cuenta");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,"transacciones_cuenta");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				transacciones_cuenta_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				transacciones_cuenta_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("banco","id_banco","cuentascorrientes","",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco_img_busqueda").click(function(){
				transacciones_cuenta_webcontrol1.abrirBusquedaParabanco("id_banco");
				//alert(jQuery('#form-id_banco_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(transacciones_cuenta_control) {
		
		jQuery("#divBusquedatransacciones_cuentaAjaxWebPart").css("display",transacciones_cuenta_control.strPermisoBusqueda);
		jQuery("#trtransacciones_cuentaCabeceraBusquedas").css("display",transacciones_cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedatransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostransacciones_cuenta").attr("style",transacciones_cuenta_control.strPermisoMostrarTodos);		
		
		if(transacciones_cuenta_control.strPermisoNuevo!=null) {
			jQuery("#tdtransacciones_cuentaNuevo").css("display",transacciones_cuenta_control.strPermisoNuevo);
			jQuery("#tdtransacciones_cuentaNuevoToolBar").css("display",transacciones_cuenta_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtransacciones_cuentaDuplicar").css("display",transacciones_cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtransacciones_cuentaDuplicarToolBar").css("display",transacciones_cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtransacciones_cuentaNuevoGuardarCambios").css("display",transacciones_cuenta_control.strPermisoNuevo);
			jQuery("#tdtransacciones_cuentaNuevoGuardarCambiosToolBar").css("display",transacciones_cuenta_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(transacciones_cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdtransacciones_cuentaCopiar").css("display",transacciones_cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtransacciones_cuentaCopiarToolBar").css("display",transacciones_cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtransacciones_cuentaConEditar").css("display",transacciones_cuenta_control.strPermisoActualizar);
		}
		
		jQuery("#tdtransacciones_cuentaGuardarCambios").css("display",transacciones_cuenta_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtransacciones_cuentaGuardarCambiosToolBar").css("display",transacciones_cuenta_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtransacciones_cuentaCerrarPagina").css("display",transacciones_cuenta_control.strPermisoPopup);		
		jQuery("#tdtransacciones_cuentaCerrarPaginaToolBar").css("display",transacciones_cuenta_control.strPermisoPopup);
		//jQuery("#trtransacciones_cuentaAccionesRelaciones").css("display",transacciones_cuenta_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=transacciones_cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + transacciones_cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Transacciones Cuentas";
		sTituloBanner+=" - " + transacciones_cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtransacciones_cuentaRelacionesToolBar").css("display",transacciones_cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostransacciones_cuenta").css("display",transacciones_cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		transacciones_cuenta_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		transacciones_cuenta_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_webcontrol1.registrarEventosControles();
		
		if(transacciones_cuenta_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="false") {
			transacciones_cuenta_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(transacciones_cuenta_constante1.STR_ES_RELACIONES=="true") {
			if(transacciones_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				transacciones_cuenta_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(transacciones_cuenta_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(transacciones_cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				transacciones_cuenta_webcontrol1.onLoad();
			
			//} else {
				//if(transacciones_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			transacciones_cuenta_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);	
	}
}

var transacciones_cuenta_webcontrol1=new transacciones_cuenta_webcontrol();

if(transacciones_cuenta_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = transacciones_cuenta_webcontrol1.onLoadWindow; 
}

</script>