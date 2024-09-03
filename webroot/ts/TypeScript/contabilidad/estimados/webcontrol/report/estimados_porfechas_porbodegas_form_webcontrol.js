<script type="text/javascript" language="javascript">



//var estimados_porfechas_porbodegasJQueryPaginaWebInteraccion= function (estimados_porfechas_porbodegas_control) {
//this.,this.,this.

class estimados_porfechas_porbodegas_webcontrol extends estimados_porfechas_porbodegas_webcontrol_add {
	
	estimados_porfechas_porbodegas_control=null;
	estimados_porfechas_porbodegas_controlInicial=null;
	estimados_porfechas_porbodegas_controlAuxiliar=null;
		
	//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimados_porfechas_porbodegas_control) {
		super();
		
		this.estimados_porfechas_porbodegas_control=estimados_porfechas_porbodegas_control;
	}
		
	actualizarVariablesPagina(estimados_porfechas_porbodegas_control) {
		
		if(estimados_porfechas_porbodegas_control.action=="index" || estimados_porfechas_porbodegas_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimados_porfechas_porbodegas_control);
			
		} 
		
		
		
	
		else if(estimados_porfechas_porbodegas_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimados_porfechas_porbodegas_control);	
		
		} else if(estimados_porfechas_porbodegas_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimados_porfechas_porbodegas_control);		
		}
	
	
		
		
		else if(estimados_porfechas_porbodegas_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimados_porfechas_porbodegas_control);
		
		} else if(estimados_porfechas_porbodegas_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(estimados_porfechas_porbodegas_control);		
		
		} else if(estimados_porfechas_porbodegas_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimados_porfechas_porbodegas_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estimados_porfechas_porbodegas_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estimados_porfechas_porbodegas_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaAccionesGenerales(estimados_porfechas_porbodegas_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estimados_porfechas_porbodegas_control) {
		
		this.actualizarPaginaCargaGeneral(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaOrderBy(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control);
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaAreaBusquedas(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estimados_porfechas_porbodegas_control) {
		//this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimados_porfechas_porbodegas_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(estimados_porfechas_porbodegas_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimados_porfechas_porbodegas_control) {
		this.actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);
		this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		this.onLoadCombosDefectoFK(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		this.actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimados_porfechas_porbodegas_control) {
		//FORMULARIO
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estimados_porfechas_porbodegas_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);		
		
		//COMBOS FK
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(estimados_porfechas_porbodegas_control) {
		//FORMULARIO
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimados_porfechas_porbodegas_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control);	
		//COMBOS FK
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estimados_porfechas_porbodegas_control) {
		
		if(estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimados_porfechas_porbodegas_control);
		}
		
		if(estimados_porfechas_porbodegas_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estimados_porfechas_porbodegas_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estimados_porfechas_porbodegasReturnGeneral",JSON.stringify(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimados_porfechas_porbodegas_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estimados_porfechas_porbodegas_control, mostrar) {
		
		if(mostrar==true) {
			estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivsPagina(false,"estimados_porfechas_porbodegas");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMantenimiento(false,"estimados_porfechas_porbodegas");
			}			
			
			estimados_porfechas_porbodegas_funcion1.mostrarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensaje,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		
		} else {
			estimados_porfechas_porbodegas_funcion1.mostrarDivMensaje(false,estimados_porfechas_porbodegas_control.strAuxiliarMensaje,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimados_porfechas_porbodegas_control) {
		if(estimados_porfechas_porbodegas_funcion1.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			window.opener.estimados_porfechas_porbodegas_webcontrol1.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		} else {
			this.actualizarPaginaTablaDatos(estimados_porfechas_porbodegas_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimados_porfechas_porbodegas_control) {
		estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina);
				
		estimados_porfechas_porbodegas_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimados_porfechas_porbodegas_control.strAuxiliarTipo,estimados_porfechas_porbodegas_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimados_porfechas_porbodegas_control) {
		estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
			
		if(estimados_porfechas_porbodegas_funcion1.esPaginaForm(estimados_porfechas_porbodegas_constante1)==true) {
			window.opener.estimados_porfechas_porbodegas_funcion1.resaltarRestaurarDivMensaje(true,estimados_porfechas_porbodegas_control.strAuxiliarMensajeAlert,estimados_porfechas_porbodegas_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estimados_porfechas_porbodegas_control) {
		this.estimados_porfechas_porbodegas_controlInicial=estimados_porfechas_porbodegas_control;
			
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimados_porfechas_porbodegas_control.strStyleDivArbol,estimados_porfechas_porbodegas_control.strStyleDivContent
																,estimados_porfechas_porbodegas_control.strStyleDivOpcionesBanner,estimados_porfechas_porbodegas_control.strStyleDivExpandirColapsar
																,estimados_porfechas_porbodegas_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estimados_porfechas_porbodegas_control) {
		this.actualizarCssBotonesPagina(estimados_porfechas_porbodegas_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimados_porfechas_porbodegas_control.tiposReportes,estimados_porfechas_porbodegas_control.tiposReporte
															 	,estimados_porfechas_porbodegas_control.tiposPaginacion,estimados_porfechas_porbodegas_control.tiposAcciones
																,estimados_porfechas_porbodegas_control.tiposColumnasSelect,estimados_porfechas_porbodegas_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimados_porfechas_porbodegas_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimados_porfechas_porbodegas_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimados_porfechas_porbodegas_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estimados_porfechas_porbodegas_control) {
	
		var indexPosition=estimados_porfechas_porbodegas_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimados_porfechas_porbodegas_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estimados_porfechas_porbodegas_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!=null && estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!='NINGUNO' && estimados_porfechas_porbodegas_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(estimados_porfechas_porbodegas_control) {
		jQuery("#tdestimados_porfechas_porbodegasNuevo").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo);
		jQuery("#trestimados_porfechas_porbodegasElementos").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaElementos);
		jQuery("#trestimados_porfechas_porbodegasAcciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAcciones);
		jQuery("#trestimados_porfechas_porbodegasParametrosAcciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(estimados_porfechas_porbodegas_control) {
	
		this.actualizarCssBotonesMantenimiento(estimados_porfechas_porbodegas_control);
				
		if(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual!=null) {//form
			
			this.actualizarCamposFormulario(estimados_porfechas_porbodegas_control);			
		}
						
		this.actualizarSpanMensajesCampos(estimados_porfechas_porbodegas_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(estimados_porfechas_porbodegas_control) {
	
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-id").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.id);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-version_row").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.versionRow);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-fecha_emision_desde").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision_desde);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-fecha_emision_hasta").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision_hasta);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-codigo_desde").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_desde);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-codigo_hasta").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_hasta);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-numero").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.numero);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-fecha_emision").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.fecha_emision);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-tipo_cambio").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.tipo_cambio);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-moneda").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.moneda);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-precio").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.precio);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-total_iva_monto").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.total_iva_monto);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-codigo_dato").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_dato);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-nombre").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.nombre);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-nombre_completo").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.nombre_completo);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-codigo_productos").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.codigo_productos);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-subtotal").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.subtotal);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-iva_monto").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.iva_monto);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-otro_monto").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.otro_monto);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-descuento_monto").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.descuento_monto);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-total").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.total);
		jQuery("#form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO+"-costo").val(estimados_porfechas_porbodegas_control.estimados_porfechas_porbodegasActual.costo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+estimados_porfechas_porbodegas_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("estimados_porfechas_porbodegas","estimados","report","form_estimados_porfechas_porbodegas",formulario,"","",paraEventoTabla,idFilaTabla,estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
	}
	
	actualizarSpanMensajesCampos(estimados_porfechas_porbodegas_control) {
		jQuery("#spanstrMensajeid").text(estimados_porfechas_porbodegas_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(estimados_porfechas_porbodegas_control.strMensajeversion_row);		
		jQuery("#spanstrMensajefecha_emision_desde").text(estimados_porfechas_porbodegas_control.strMensajefecha_emision_desde);		
		jQuery("#spanstrMensajefecha_emision_hasta").text(estimados_porfechas_porbodegas_control.strMensajefecha_emision_hasta);		
		jQuery("#spanstrMensajecodigo_desde").text(estimados_porfechas_porbodegas_control.strMensajecodigo_desde);		
		jQuery("#spanstrMensajecodigo_hasta").text(estimados_porfechas_porbodegas_control.strMensajecodigo_hasta);		
		jQuery("#spanstrMensajenumero").text(estimados_porfechas_porbodegas_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(estimados_porfechas_porbodegas_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajetipo_cambio").text(estimados_porfechas_porbodegas_control.strMensajetipo_cambio);		
		jQuery("#spanstrMensajemoneda").text(estimados_porfechas_porbodegas_control.strMensajemoneda);		
		jQuery("#spanstrMensajeprecio").text(estimados_porfechas_porbodegas_control.strMensajeprecio);		
		jQuery("#spanstrMensajetotal_iva_monto").text(estimados_porfechas_porbodegas_control.strMensajetotal_iva_monto);		
		jQuery("#spanstrMensajecodigo_dato").text(estimados_porfechas_porbodegas_control.strMensajecodigo_dato);		
		jQuery("#spanstrMensajenombre").text(estimados_porfechas_porbodegas_control.strMensajenombre);		
		jQuery("#spanstrMensajenombre_completo").text(estimados_porfechas_porbodegas_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajecodigo_productos").text(estimados_porfechas_porbodegas_control.strMensajecodigo_productos);		
		jQuery("#spanstrMensajesubtotal").text(estimados_porfechas_porbodegas_control.strMensajesubtotal);		
		jQuery("#spanstrMensajeiva_monto").text(estimados_porfechas_porbodegas_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeotro_monto").text(estimados_porfechas_porbodegas_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajedescuento_monto").text(estimados_porfechas_porbodegas_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajetotal").text(estimados_porfechas_porbodegas_control.strMensajetotal);		
		jQuery("#spanstrMensajecosto").text(estimados_porfechas_porbodegas_control.strMensajecosto);		
	}
	
	actualizarCssBotonesMantenimiento(estimados_porfechas_porbodegas_control) {
		jQuery("#tdbtnNuevoestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarestimados_porfechas_porbodegas").css("visibility",estimados_porfechas_porbodegas_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimados_porfechas_porbodegas_control
		
	
	}
	
	onLoadCombosDefectoFK(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimados_porfechas_porbodegas_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimados_porfechas_porbodegas_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_FORM==true) {
				estimados_porfechas_porbodegas_funcion1.validarFormularioJQuery(estimados_porfechas_porbodegas_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimados_porfechas_porbodegas");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimados_porfechas_porbodegas");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,"estimados_porfechas_porbodegas");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimados_porfechas_porbodegas_control) {
		
		
		
		if(estimados_porfechas_porbodegas_control.strPermisoActualizar!=null) {
			jQuery("#tdestimados_porfechas_porbodegasActualizarToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdestimados_porfechas_porbodegasEliminarToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trestimados_porfechas_porbodegasElementos").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaElementos);
		
		jQuery("#trestimados_porfechas_porbodegasAcciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAcciones);
		jQuery("#trestimados_porfechas_porbodegasParametrosAcciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAcciones);
		
		jQuery("#tdestimados_porfechas_porbodegasCerrarPagina").css("display",estimados_porfechas_porbodegas_control.strPermisoPopup);		
		jQuery("#tdestimados_porfechas_porbodegasCerrarPaginaToolBar").css("display",estimados_porfechas_porbodegas_control.strPermisoPopup);
		//jQuery("#trestimados_porfechas_porbodegasAccionesRelaciones").css("display",estimados_porfechas_porbodegas_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimados_porfechas_porbodegas_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estimados_porfechas_porbodegas_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estimados Porfechas Porbodegases";
		sTituloBanner+=" - " + estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimados_porfechas_porbodegas_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestimados_porfechas_porbodegasRelacionesToolBar").css("display",estimados_porfechas_porbodegas_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestimados_porfechas_porbodegas").css("display",estimados_porfechas_porbodegas_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estimados_porfechas_porbodegas_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estimados_porfechas_porbodegas_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimados_porfechas_porbodegas_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimados_porfechas_porbodegas_webcontrol1.registrarEventosControles();
		
		if(estimados_porfechas_porbodegas_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
			estimados_porfechas_porbodegas_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONES=="true") {
			if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_FORM==true) {
				estimados_porfechas_porbodegas_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimados_porfechas_porbodegas_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(estimados_porfechas_porbodegas_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(estimados_porfechas_porbodegas_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
						//estimados_porfechas_porbodegas_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(estimados_porfechas_porbodegas_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(estimados_porfechas_porbodegas_constante1.BIG_ID_ACTUAL,"estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);
						//estimados_porfechas_porbodegas_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			estimados_porfechas_porbodegas_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimados_porfechas_porbodegas","estimados","report",estimados_porfechas_porbodegas_funcion1,estimados_porfechas_porbodegas_webcontrol1,estimados_porfechas_porbodegas_constante1);	
	}
}

var estimados_porfechas_porbodegas_webcontrol1=new estimados_porfechas_porbodegas_webcontrol();

if(estimados_porfechas_porbodegas_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimados_porfechas_porbodegas_webcontrol1.onLoadWindow; 
}

</script>