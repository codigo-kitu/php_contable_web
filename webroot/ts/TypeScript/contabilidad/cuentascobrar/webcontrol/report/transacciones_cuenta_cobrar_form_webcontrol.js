<script type="text/javascript" language="javascript">



//var transacciones_cuenta_cobrarJQueryPaginaWebInteraccion= function (transacciones_cuenta_cobrar_control) {
//this.,this.,this.

class transacciones_cuenta_cobrar_webcontrol extends transacciones_cuenta_cobrar_webcontrol_add {
	
	transacciones_cuenta_cobrar_control=null;
	transacciones_cuenta_cobrar_controlInicial=null;
	transacciones_cuenta_cobrar_controlAuxiliar=null;
		
	//if(transacciones_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(transacciones_cuenta_cobrar_control) {
		super();
		
		this.transacciones_cuenta_cobrar_control=transacciones_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(transacciones_cuenta_cobrar_control) {
		
		if(transacciones_cuenta_cobrar_control.action=="index" || transacciones_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(transacciones_cuenta_cobrar_control);
			
		} 
		
		
		
	
		else if(transacciones_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_cobrar_control);	
		
		} else if(transacciones_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_cobrar_control);		
		}
	
	
		
		
		else if(transacciones_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(transacciones_cuenta_cobrar_control);
		
		} else if(transacciones_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(transacciones_cuenta_cobrar_control);
		
		} else if(transacciones_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(transacciones_cuenta_cobrar_control);
		
		} else if(transacciones_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(transacciones_cuenta_cobrar_control);
		
		} else if(transacciones_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(transacciones_cuenta_cobrar_control);
		
		} else if(transacciones_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(transacciones_cuenta_cobrar_control);		
		
		} else if(transacciones_cuenta_cobrar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(transacciones_cuenta_cobrar_control);		
		
		} 
		//else if(transacciones_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(transacciones_cuenta_cobrar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + transacciones_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(transacciones_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(transacciones_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_cobrar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(transacciones_cuenta_cobrar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(transacciones_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(transacciones_cuenta_cobrar_control) {
		//FORMULARIO
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(transacciones_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);		
		
		//COMBOS FK
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(transacciones_cuenta_cobrar_control) {
		//FORMULARIO
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(transacciones_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);	
		
		//COMBOS FK
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(transacciones_cuenta_cobrar_control) {
		//FORMULARIO
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control);	
		//COMBOS FK
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(transacciones_cuenta_cobrar_control) {
		
		if(transacciones_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(transacciones_cuenta_cobrar_control);
		}
		
		if(transacciones_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(transacciones_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(transacciones_cuenta_cobrar_control) {
		if(transacciones_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("transacciones_cuenta_cobrarReturnGeneral",JSON.stringify(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_cobrar_control) {
		if(transacciones_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && transacciones_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(transacciones_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(transacciones_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			transacciones_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"transacciones_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				transacciones_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"transacciones_cuenta_cobrar");
			}			
			
			transacciones_cuenta_cobrar_funcion1.mostrarDivMensaje(true,transacciones_cuenta_cobrar_control.strAuxiliarMensaje,transacciones_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			transacciones_cuenta_cobrar_funcion1.mostrarDivMensaje(false,transacciones_cuenta_cobrar_control.strAuxiliarMensaje,transacciones_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_cobrar_control) {
		if(transacciones_cuenta_cobrar_funcion1.esPaginaForm(transacciones_cuenta_cobrar_constante1)==true) {
			window.opener.transacciones_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(transacciones_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(transacciones_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(transacciones_cuenta_cobrar_control) {
		transacciones_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(transacciones_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		transacciones_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(transacciones_cuenta_cobrar_control.strAuxiliarTipo,transacciones_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(transacciones_cuenta_cobrar_control) {
		transacciones_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_cobrar_control.strAuxiliarMensajeAlert,transacciones_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(transacciones_cuenta_cobrar_funcion1.esPaginaForm(transacciones_cuenta_cobrar_constante1)==true) {
			window.opener.transacciones_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,transacciones_cuenta_cobrar_control.strAuxiliarMensajeAlert,transacciones_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(transacciones_cuenta_cobrar_control) {
		this.transacciones_cuenta_cobrar_controlInicial=transacciones_cuenta_cobrar_control;
			
		if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(transacciones_cuenta_cobrar_control.strStyleDivArbol,transacciones_cuenta_cobrar_control.strStyleDivContent
																,transacciones_cuenta_cobrar_control.strStyleDivOpcionesBanner,transacciones_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,transacciones_cuenta_cobrar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(transacciones_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(transacciones_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(transacciones_cuenta_cobrar_control.tiposReportes,transacciones_cuenta_cobrar_control.tiposReporte
															 	,transacciones_cuenta_cobrar_control.tiposPaginacion,transacciones_cuenta_cobrar_control.tiposAcciones
																,transacciones_cuenta_cobrar_control.tiposColumnasSelect,transacciones_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(transacciones_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(transacciones_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(transacciones_cuenta_cobrar_control) {
	
		var indexPosition=transacciones_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=transacciones_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(transacciones_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_cobrar_control);
			}

			if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(transacciones_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(transacciones_cuenta_cobrar_control);
				}

				if(transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					transacciones_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(transacciones_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(transacciones_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(transacciones_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(transacciones_cuenta_cobrar_control) {
		jQuery("#tdtransacciones_cuenta_cobrarNuevo").css("display",transacciones_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trtransacciones_cuenta_cobrarElementos").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trtransacciones_cuenta_cobrarAcciones").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trtransacciones_cuenta_cobrarParametrosAcciones").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(transacciones_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(transacciones_cuenta_cobrar_control);
				
		if(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(transacciones_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(transacciones_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(transacciones_cuenta_cobrar_control) {
	
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.versionRow);
		
		if(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_empresa!=null && transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_empresa) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_sucursal!=null && transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_sucursal) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_cuenta").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.numero_cuenta);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-cliente").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.cliente);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-tipo").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.tipo);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_emision").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.fecha_emision);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-debito").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.debito);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-credito").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.credito);
		jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-descripcion").val(transacciones_cuenta_cobrar_control.transacciones_cuenta_cobrarActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("transacciones_cuenta_cobrar","cuentascobrar","report","form_transacciones_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
	}
	
	actualizarSpanMensajesCampos(transacciones_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(transacciones_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(transacciones_cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(transacciones_cuenta_cobrar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(transacciones_cuenta_cobrar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajenumero_cuenta").text(transacciones_cuenta_cobrar_control.strMensajenumero_cuenta);		
		jQuery("#spanstrMensajecliente").text(transacciones_cuenta_cobrar_control.strMensajecliente);		
		jQuery("#spanstrMensajetipo").text(transacciones_cuenta_cobrar_control.strMensajetipo);		
		jQuery("#spanstrMensajefecha_emision").text(transacciones_cuenta_cobrar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajedebito").text(transacciones_cuenta_cobrar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(transacciones_cuenta_cobrar_control.strMensajecredito);		
		jQuery("#spanstrMensajedescripcion").text(transacciones_cuenta_cobrar_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(transacciones_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevotransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotransacciones_cuenta_cobrar").css("display",transacciones_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartransacciones_cuenta_cobrar").css("display",transacciones_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartransacciones_cuenta_cobrar").css("display",transacciones_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostransacciones_cuenta_cobrar").css("display",transacciones_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartransacciones_cuenta_cobrar").css("visibility",transacciones_cuenta_cobrar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(transacciones_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",transacciones_cuenta_cobrar_control.empresasFK);

		if(transacciones_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_cobrar_control.idFilaTablaActual+"_2",transacciones_cuenta_cobrar_control.empresasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa",transacciones_cuenta_cobrar_control.empresasFK);

	};

	cargarCombossucursalsFK(transacciones_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",transacciones_cuenta_cobrar_control.sucursalsFK);

		if(transacciones_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+transacciones_cuenta_cobrar_control.idFilaTablaActual+"_3",transacciones_cuenta_cobrar_control.sucursalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal",transacciones_cuenta_cobrar_control.sucursalsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(transacciones_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(transacciones_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(transacciones_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != transacciones_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(transacciones_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(transacciones_cuenta_cobrar_control.idempresaDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(transacciones_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(transacciones_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != transacciones_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(transacciones_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(transacciones_cuenta_cobrar_control.idsucursalDefaultForeignKey).trigger("change");
			if(jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//transacciones_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(transacciones_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(transacciones_cuenta_cobrar_control);
			}

			if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				transacciones_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(transacciones_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(transacciones_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(transacciones_cuenta_cobrar_control);
			//}

			//if(transacciones_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",transacciones_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				transacciones_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(transacciones_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(transacciones_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(transacciones_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(transacciones_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(transacciones_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				transacciones_cuenta_cobrar_funcion1.validarFormularioJQuery(transacciones_cuenta_cobrar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("transacciones_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("transacciones_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,"transacciones_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				transacciones_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+transacciones_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				transacciones_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(transacciones_cuenta_cobrar_control) {
		
		
		
		if(transacciones_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdtransacciones_cuenta_cobrarActualizarToolBar").css("display",transacciones_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtransacciones_cuenta_cobrarEliminarToolBar").css("display",transacciones_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtransacciones_cuenta_cobrarElementos").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trtransacciones_cuenta_cobrarAcciones").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trtransacciones_cuenta_cobrarParametrosAcciones").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaAcciones);
		
		jQuery("#tdtransacciones_cuenta_cobrarCerrarPagina").css("display",transacciones_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdtransacciones_cuenta_cobrarCerrarPaginaToolBar").css("display",transacciones_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trtransacciones_cuenta_cobrarAccionesRelaciones").css("display",transacciones_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=transacciones_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + transacciones_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Transacciones Cuentas";
		sTituloBanner+=" - " + transacciones_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + transacciones_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtransacciones_cuenta_cobrarRelacionesToolBar").css("display",transacciones_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostransacciones_cuenta_cobrar").css("display",transacciones_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		transacciones_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		transacciones_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		transacciones_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(transacciones_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			transacciones_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(transacciones_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				transacciones_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(transacciones_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(transacciones_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(transacciones_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(transacciones_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
						//transacciones_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(transacciones_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(transacciones_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);
						//transacciones_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			transacciones_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("transacciones_cuenta_cobrar","cuentascobrar","report",transacciones_cuenta_cobrar_funcion1,transacciones_cuenta_cobrar_webcontrol1,transacciones_cuenta_cobrar_constante1);	
	}
}

var transacciones_cuenta_cobrar_webcontrol1=new transacciones_cuenta_cobrar_webcontrol();

if(transacciones_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = transacciones_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

</script>