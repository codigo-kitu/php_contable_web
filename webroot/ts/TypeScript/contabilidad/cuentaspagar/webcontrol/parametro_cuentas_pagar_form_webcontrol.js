<script type="text/javascript" language="javascript">



//var parametro_cuentas_pagarJQueryPaginaWebInteraccion= function (parametro_cuentas_pagar_control) {
//this.,this.,this.

class parametro_cuentas_pagar_webcontrol extends parametro_cuentas_pagar_webcontrol_add {
	
	parametro_cuentas_pagar_control=null;
	parametro_cuentas_pagar_controlInicial=null;
	parametro_cuentas_pagar_controlAuxiliar=null;
		
	//if(parametro_cuentas_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_cuentas_pagar_control) {
		super();
		
		this.parametro_cuentas_pagar_control=parametro_cuentas_pagar_control;
	}
		
	actualizarVariablesPagina(parametro_cuentas_pagar_control) {
		
		if(parametro_cuentas_pagar_control.action=="index" || parametro_cuentas_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_cuentas_pagar_control);
			
		} 
		
		
		
	
		else if(parametro_cuentas_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_cuentas_pagar_control);	
		
		} else if(parametro_cuentas_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuentas_pagar_control);		
		}
	
	
		
		
		else if(parametro_cuentas_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_cuentas_pagar_control);
		
		} else if(parametro_cuentas_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_cuentas_pagar_control);
		
		} else if(parametro_cuentas_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_cuentas_pagar_control);
		
		} else if(parametro_cuentas_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuentas_pagar_control);
		
		} else if(parametro_cuentas_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuentas_pagar_control);
		
		} else if(parametro_cuentas_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_cuentas_pagar_control);		
		
		} else if(parametro_cuentas_pagar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuentas_pagar_control);		
		
		} 

		
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert(parametro_cuentas_pagar_control.action + " Revisar Manejo");
			
			if(parametro_cuentas_pagar_control.bitEsAbrirVentanaAuxiliarUrl==true){
				this.actualizarPaginaAbrirLink(parametro_cuentas_pagar_control);
				
				return;
			}
			
			//if(parametro_cuentas_pagar_control.strAuxiliarMensajeAlert!=""){
			//	this.actualizarPaginaMensajeAlert(parametro_cuentas_pagar_control);
			//}
			
			if(parametro_cuentas_pagar_control.bitEsEjecutarFuncionJavaScript==true){
				super.actualizarPaginaEjecutarJavaScript(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuentas_pagar_control.strAuxiliarMensaje!=""){
				this.actualizarPaginaMensajePantalla(parametro_cuentas_pagar_control, true);
			} else {
				this.actualizarPaginaMensajePantalla(parametro_cuentas_pagar_control, false);			
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarGeneralAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneral(parametro_cuentas_pagar_control);	
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarAjaxWebPart==true) {
				this.actualizarPaginaTablaDatos(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarAjaxWebPart==true) {		
				this.actualizarPaginaCargaGeneralControles(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
				this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart==true) {		
				this.actualizarPaginaAreaBusquedas(parametro_cuentas_pagar_control);	
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart==true) {		
				this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
				this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);
			}
			
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {				
				this.actualizarPaginaTablaFilaActual(parametro_cuentas_pagar_control);			
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarReporteAuxiliarAjaxWebPart==true) {				
				super.actualizarPaginaImprimir(parametro_cuentas_pagar_control,"parametro_cuentas_pagar");
			}
			
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarMostrarBusquedasAjaxWebPart==true) {
				this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarResumenAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarResumen(parametro_cuentas_pagar_control);
			}				
			
			if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarAccionesRelacionesAjaxWebPart==true) {						
				this.actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_cuentas_pagar_control);
			}
			
			if(parametro_cuentas_pagar_control.usuarioActual!=null && parametro_cuentas_pagar_control.usuarioActual.field_strUserName!=null &&
			parametro_cuentas_pagar_control.usuarioActual.field_strUserName!=undefined ) {
				
				this.actualizarPaginaUsuarioInvitado(parametro_cuentas_pagar_control);			
			}
		}
		
		
		if(parametro_cuentas_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_cuentas_pagar_control);
		}		
	}
	
//Funciones Manejadores Accion

	actualizarVariablesPaginaAccionIndex(parametro_cuentas_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuentas_pagar_control);
		this.actualizarPaginaTablaDatos(parametro_cuentas_pagar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_pagar_control);
		//this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuentas_pagar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuentas_pagar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_cuentas_pagar_control) {
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuentas_pagar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_cuentas_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_cuentas_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_cuentas_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuentas_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_pagar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_cuentas_pagar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuentas_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuentas_pagar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);
		this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);
		this.onLoadCombosDefectoFK(parametro_cuentas_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuentas_pagar_control) {
		//FORMULARIO
		if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_cuentas_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);		
		
		//COMBOS FK
		if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_cuentas_pagar_control) {
		//FORMULARIO
		if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuentas_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control);	
		//COMBOS FK
		if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	actualizarPaginaMensajePantallaAuxiliar(parametro_cuentas_pagar_control) {
		if(parametro_cuentas_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuentas_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_cuentas_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_cuentas_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_cuentas_pagar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_cuentas_pagar_funcion1.resaltarRestaurarDivsPagina(false,"parametro_cuentas_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_cuentas_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_cuentas_pagar");
			}			
			
			parametro_cuentas_pagar_funcion1.mostrarDivMensaje(true,parametro_cuentas_pagar_control.strAuxiliarMensaje,parametro_cuentas_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_cuentas_pagar_funcion1.mostrarDivMensaje(false,parametro_cuentas_pagar_control.strAuxiliarMensaje,parametro_cuentas_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_cuentas_pagar_control) {
		if(parametro_cuentas_pagar_funcion1.esPaginaForm(parametro_cuentas_pagar_constante1)==true) {
			window.opener.parametro_cuentas_pagar_webcontrol1.actualizarPaginaTablaDatos(parametro_cuentas_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_cuentas_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_cuentas_pagar_control) {
		parametro_cuentas_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_cuentas_pagar_control.strAuxiliarUrlPagina);
				
		parametro_cuentas_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_cuentas_pagar_control.strAuxiliarTipo,parametro_cuentas_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_cuentas_pagar_control) {
		parametro_cuentas_pagar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuentas_pagar_control.strAuxiliarMensajeAlert,parametro_cuentas_pagar_control.strAuxiliarCssMensaje);
			
		if(parametro_cuentas_pagar_funcion1.esPaginaForm(parametro_cuentas_pagar_constante1)==true) {
			window.opener.parametro_cuentas_pagar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuentas_pagar_control.strAuxiliarMensajeAlert,parametro_cuentas_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_cuentas_pagar_control) {
		this.parametro_cuentas_pagar_controlInicial=parametro_cuentas_pagar_control;
			
		if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_cuentas_pagar_control.strStyleDivArbol,parametro_cuentas_pagar_control.strStyleDivContent
																,parametro_cuentas_pagar_control.strStyleDivOpcionesBanner,parametro_cuentas_pagar_control.strStyleDivExpandirColapsar
																,parametro_cuentas_pagar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_cuentas_pagar_control) {
		this.actualizarCssBotonesPagina(parametro_cuentas_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_cuentas_pagar_control.tiposReportes,parametro_cuentas_pagar_control.tiposReporte
															 	,parametro_cuentas_pagar_control.tiposPaginacion,parametro_cuentas_pagar_control.tiposAcciones
																,parametro_cuentas_pagar_control.tiposColumnasSelect,parametro_cuentas_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_cuentas_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_cuentas_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_cuentas_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_cuentas_pagar_control) {
	
		var indexPosition=parametro_cuentas_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_cuentas_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_cuentas_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_cuentas_pagar_control.strRecargarFkTiposNinguno!=null && parametro_cuentas_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_cuentas_pagar_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_cuentas_pagar_control) {
		jQuery("#tdparametro_cuentas_pagarNuevo").css("display",parametro_cuentas_pagar_control.strPermisoNuevo);
		jQuery("#trparametro_cuentas_pagarElementos").css("display",parametro_cuentas_pagar_control.strVisibleTablaElementos);
		jQuery("#trparametro_cuentas_pagarAcciones").css("display",parametro_cuentas_pagar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuentas_pagarParametrosAcciones").css("display",parametro_cuentas_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_cuentas_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_cuentas_pagar_control);
				
		if(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_cuentas_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_cuentas_pagar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_cuentas_pagar_control) {
	
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-id").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.id);
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-version_row").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.versionRow);
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-numero_cuenta_pagar").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.numero_cuenta_pagar);
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-numero_detalle").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.numero_detalle);
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-numero_pago").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.numero_pago);
		jQuery("#form"+parametro_cuentas_pagar_constante1.STR_SUFIJO+"-numero_credito").val(parametro_cuentas_pagar_control.parametro_cuentas_pagarActual.numero_credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_cuentas_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_cuentas_pagar","cuentaspagar","","form_parametro_cuentas_pagar",formulario,"","",paraEventoTabla,idFilaTabla,parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_cuentas_pagar_control) {
		jQuery("#spanstrMensajeid").text(parametro_cuentas_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_cuentas_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenumero_cuenta_pagar").text(parametro_cuentas_pagar_control.strMensajenumero_cuenta_pagar);		
		jQuery("#spanstrMensajenumero_detalle").text(parametro_cuentas_pagar_control.strMensajenumero_detalle);		
		jQuery("#spanstrMensajenumero_pago").text(parametro_cuentas_pagar_control.strMensajenumero_pago);		
		jQuery("#spanstrMensajenumero_credito").text(parametro_cuentas_pagar_control.strMensajenumero_credito);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_cuentas_pagar_control) {
		jQuery("#tdbtnNuevoparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_cuentas_pagar").css("display",parametro_cuentas_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_cuentas_pagar").css("display",parametro_cuentas_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_cuentas_pagar").css("display",parametro_cuentas_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_cuentas_pagar").css("display",parametro_cuentas_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_cuentas_pagar").css("visibility",parametro_cuentas_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_cuentas_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_cuentas_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_cuentas_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_cuentas_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuentas_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_cuentas_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_cuentas_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuentas_pagar_funcion1.validarFormularioJQuery(parametro_cuentas_pagar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_cuentas_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_cuentas_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,"parametro_cuentas_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_cuentas_pagar_control) {
		
		
		
		if(parametro_cuentas_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_cuentas_pagarActualizarToolBar").css("display",parametro_cuentas_pagar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_cuentas_pagarEliminarToolBar").css("display",parametro_cuentas_pagar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_cuentas_pagarElementos").css("display",parametro_cuentas_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_cuentas_pagarAcciones").css("display",parametro_cuentas_pagar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuentas_pagarParametrosAcciones").css("display",parametro_cuentas_pagar_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_cuentas_pagarCerrarPagina").css("display",parametro_cuentas_pagar_control.strPermisoPopup);		
		jQuery("#tdparametro_cuentas_pagarCerrarPaginaToolBar").css("display",parametro_cuentas_pagar_control.strPermisoPopup);
		//jQuery("#trparametro_cuentas_pagarAccionesRelaciones").css("display",parametro_cuentas_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_cuentas_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_cuentas_pagar_webcontrol1.registrarEventosControles();
		
		if(parametro_cuentas_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_cuentas_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_cuentas_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuentas_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_cuentas_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_cuentas_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_cuentas_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_cuentas_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
						//parametro_cuentas_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_cuentas_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_cuentas_pagar_constante1.BIG_ID_ACTUAL,"parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);
						//parametro_cuentas_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_cuentas_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_cuentas_pagar","cuentaspagar","",parametro_cuentas_pagar_funcion1,parametro_cuentas_pagar_webcontrol1,parametro_cuentas_pagar_constante1);	
	}
}

var parametro_cuentas_pagar_webcontrol1=new parametro_cuentas_pagar_webcontrol();

if(parametro_cuentas_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_cuentas_pagar_webcontrol1.onLoadWindow; 
}

</script>