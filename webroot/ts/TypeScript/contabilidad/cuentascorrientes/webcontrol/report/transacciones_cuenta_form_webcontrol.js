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
		
		
		
	
		else if(transacciones_cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(transacciones_cuenta_control);	
		
		} else if(transacciones_cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(transacciones_cuenta_control);		
		}
	
	
		
		
		else if(transacciones_cuenta_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(transacciones_cuenta_control);
		
		} else if(transacciones_cuenta_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(transacciones_cuenta_control);		
		
		} else if(transacciones_cuenta_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(transacciones_cuenta_control);		
		
		} 
		//else if(transacciones_cuenta_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(transacciones_cuenta_control);		
		//}

		
				
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
	
	



	actualizarVariablesPaginaAccionNuevo(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(transacciones_cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(transacciones_cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);
		this.actualizarPaginaFormulario(transacciones_cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(transacciones_cuenta_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(transacciones_cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(transacciones_cuenta_control);
		this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);
		this.actualizarPaginaFormulario(transacciones_cuenta_control);
		this.onLoadCombosDefectoFK(transacciones_cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(transacciones_cuenta_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(transacciones_cuenta_control) {
		//FORMULARIO
		if(transacciones_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(transacciones_cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);		
		
		//COMBOS FK
		if(transacciones_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(transacciones_cuenta_control) {
		//FORMULARIO
		if(transacciones_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(transacciones_cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);	
		
		//COMBOS FK
		if(transacciones_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(transacciones_cuenta_control) {
		//FORMULARIO
		if(transacciones_cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(transacciones_cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(transacciones_cuenta_control);	
		//COMBOS FK
		if(transacciones_cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(transacciones_cuenta_control);
		}
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
	


	actualizarPaginaAreaMantenimiento(transacciones_cuenta_control) {
		jQuery("#tdtransacciones_cuentaNuevo").css("display",transacciones_cuenta_control.strPermisoNuevo);
		jQuery("#trtransacciones_cuentaElementos").css("display",transacciones_cuenta_control.strVisibleTablaElementos);
		jQuery("#trtransacciones_cuentaAcciones").css("display",transacciones_cuenta_control.strVisibleTablaAcciones);
		jQuery("#trtransacciones_cuentaParametrosAcciones").css("display",transacciones_cuenta_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(transacciones_cuenta_control) {
	
		this.actualizarCssBotonesMantenimiento(transacciones_cuenta_control);
				
		if(transacciones_cuenta_control.transacciones_cuentaActual!=null) {//form
			
			this.actualizarCamposFormulario(transacciones_cuenta_control);			
		}
						
		this.actualizarSpanMensajesCampos(transacciones_cuenta_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(transacciones_cuenta_control) {
	
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id").val(transacciones_cuenta_control.transacciones_cuentaActual.id);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-version_row").val(transacciones_cuenta_control.transacciones_cuentaActual.versionRow);
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_empresa!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_empresa>-1){
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_empresa) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(transacciones_cuenta_control.transacciones_cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_usuario!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_usuario>-1){
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_usuario) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val(transacciones_cuenta_control.transacciones_cuentaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(transacciones_cuenta_control.transacciones_cuentaActual.id_banco!=null && transacciones_cuenta_control.transacciones_cuentaActual.id_banco>-1){
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val() != transacciones_cuenta_control.transacciones_cuentaActual.id_banco) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val(transacciones_cuenta_control.transacciones_cuentaActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").select2("val", null);
			if(jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-id_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-numero_cuenta").val(transacciones_cuenta_control.transacciones_cuentaActual.numero_cuenta);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-tipo").val(transacciones_cuenta_control.transacciones_cuentaActual.tipo);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-fecha_emision").val(transacciones_cuenta_control.transacciones_cuentaActual.fecha_emision);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-debito").val(transacciones_cuenta_control.transacciones_cuentaActual.debito);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-credito").val(transacciones_cuenta_control.transacciones_cuentaActual.credito);
		jQuery("#form"+transacciones_cuenta_constante1.STR_SUFIJO+"-descripcion").val(transacciones_cuenta_control.transacciones_cuentaActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+transacciones_cuenta_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("transacciones_cuenta","cuentascorrientes","report","form_transacciones_cuenta",formulario,"","",paraEventoTabla,idFilaTabla,transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
	}
	
	actualizarSpanMensajesCampos(transacciones_cuenta_control) {
		jQuery("#spanstrMensajeid").text(transacciones_cuenta_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(transacciones_cuenta_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(transacciones_cuenta_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_usuario").text(transacciones_cuenta_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_banco").text(transacciones_cuenta_control.strMensajeid_banco);		
		jQuery("#spanstrMensajenumero_cuenta").text(transacciones_cuenta_control.strMensajenumero_cuenta);		
		jQuery("#spanstrMensajetipo").text(transacciones_cuenta_control.strMensajetipo);		
		jQuery("#spanstrMensajefecha_emision").text(transacciones_cuenta_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajedebito").text(transacciones_cuenta_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(transacciones_cuenta_control.strMensajecredito);		
		jQuery("#spanstrMensajedescripcion").text(transacciones_cuenta_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(transacciones_cuenta_control) {
		jQuery("#tdbtnNuevotransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostransacciones_cuenta").css("display",transacciones_cuenta_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartransacciones_cuenta").css("visibility",transacciones_cuenta_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
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
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(transacciones_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				transacciones_cuenta_funcion1.validarFormularioJQuery(transacciones_cuenta_constante1);
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
		
		
		
		if(transacciones_cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdtransacciones_cuentaActualizarToolBar").css("display",transacciones_cuenta_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtransacciones_cuentaEliminarToolBar").css("display",transacciones_cuenta_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtransacciones_cuentaElementos").css("display",transacciones_cuenta_control.strVisibleTablaElementos);
		
		jQuery("#trtransacciones_cuentaAcciones").css("display",transacciones_cuenta_control.strVisibleTablaAcciones);
		jQuery("#trtransacciones_cuentaParametrosAcciones").css("display",transacciones_cuenta_control.strVisibleTablaAcciones);
		
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
			
			//} else {
				//if(transacciones_cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(transacciones_cuenta_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
						//transacciones_cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(transacciones_cuenta_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(transacciones_cuenta_constante1.BIG_ID_ACTUAL,"transacciones_cuenta","cuentascorrientes","report",transacciones_cuenta_funcion1,transacciones_cuenta_webcontrol1,transacciones_cuenta_constante1);
						//transacciones_cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
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