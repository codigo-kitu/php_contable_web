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
		
		
		
	
		else if(clientes_por_vendedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(clientes_por_vendedor_control);	
		
		} else if(clientes_por_vendedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(clientes_por_vendedor_control);		
		}
	
	
		
		
		else if(clientes_por_vendedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clientes_por_vendedor_control);
		
		} else if(clientes_por_vendedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(clientes_por_vendedor_control);		
		
		} else if(clientes_por_vendedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(clientes_por_vendedor_control);		
		
		} 
		//else if(clientes_por_vendedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clientes_por_vendedor_control);		
		//}

		
				
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
	
	



	actualizarVariablesPaginaAccionNuevo(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(clientes_por_vendedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clientes_por_vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(clientes_por_vendedor_control);
		this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);
		this.actualizarPaginaFormulario(clientes_por_vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(clientes_por_vendedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clientes_por_vendedor_control) {
		this.actualizarPaginaCargaGeneralControles(clientes_por_vendedor_control);
		this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);
		this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		this.onLoadCombosDefectoFK(clientes_por_vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(clientes_por_vendedor_control) {
		//FORMULARIO
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clientes_por_vendedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(clientes_por_vendedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);		
		
		//COMBOS FK
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clientes_por_vendedor_control) {
		//FORMULARIO
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clientes_por_vendedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(clientes_por_vendedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);	
		
		//COMBOS FK
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(clientes_por_vendedor_control) {
		//FORMULARIO
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clientes_por_vendedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clientes_por_vendedor_control);	
		//COMBOS FK
		if(clientes_por_vendedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clientes_por_vendedor_control);
		}
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
	


	actualizarPaginaAreaMantenimiento(clientes_por_vendedor_control) {
		jQuery("#tdclientes_por_vendedorNuevo").css("display",clientes_por_vendedor_control.strPermisoNuevo);
		jQuery("#trclientes_por_vendedorElementos").css("display",clientes_por_vendedor_control.strVisibleTablaElementos);
		jQuery("#trclientes_por_vendedorAcciones").css("display",clientes_por_vendedor_control.strVisibleTablaAcciones);
		jQuery("#trclientes_por_vendedorParametrosAcciones").css("display",clientes_por_vendedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(clientes_por_vendedor_control) {
	
		this.actualizarCssBotonesMantenimiento(clientes_por_vendedor_control);
				
		if(clientes_por_vendedor_control.clientes_por_vendedorActual!=null) {//form
			
			this.actualizarCamposFormulario(clientes_por_vendedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(clientes_por_vendedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(clientes_por_vendedor_control) {
	
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id").val(clientes_por_vendedor_control.clientes_por_vendedorActual.id);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-version_row").val(clientes_por_vendedor_control.clientes_por_vendedorActual.versionRow);
		
		if(clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor!=null && clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor>-1){
			if(jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val() != clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor) {
				jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val(clientes_por_vendedor_control.clientes_por_vendedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-codigo").val(clientes_por_vendedor_control.clientes_por_vendedorActual.codigo);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-nombre_completo").val(clientes_por_vendedor_control.clientes_por_vendedorActual.nombre_completo);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-direccion").val(clientes_por_vendedor_control.clientes_por_vendedorActual.direccion);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-telefono").val(clientes_por_vendedor_control.clientes_por_vendedorActual.telefono);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-e_mail").val(clientes_por_vendedor_control.clientes_por_vendedorActual.e_mail);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-maximo_credito").val(clientes_por_vendedor_control.clientes_por_vendedorActual.maximo_credito);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-codigovendedores").val(clientes_por_vendedor_control.clientes_por_vendedorActual.codigovendedores);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-nombre").val(clientes_por_vendedor_control.clientes_por_vendedorActual.nombre);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-monto").val(clientes_por_vendedor_control.clientes_por_vendedorActual.monto);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-numero").val(clientes_por_vendedor_control.clientes_por_vendedorActual.numero);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-termino").val(clientes_por_vendedor_control.clientes_por_vendedorActual.termino);
		jQuery("#form"+clientes_por_vendedor_constante1.STR_SUFIJO+"-fecha").val(clientes_por_vendedor_control.clientes_por_vendedorActual.fecha);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+clientes_por_vendedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("clientes_por_vendedor","cuentascobrar","report","form_clientes_por_vendedor",formulario,"","",paraEventoTabla,idFilaTabla,clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
	}
	
	actualizarSpanMensajesCampos(clientes_por_vendedor_control) {
		jQuery("#spanstrMensajeid").text(clientes_por_vendedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(clientes_por_vendedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_vendedor").text(clientes_por_vendedor_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajecodigo").text(clientes_por_vendedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre_completo").text(clientes_por_vendedor_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajedireccion").text(clientes_por_vendedor_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(clientes_por_vendedor_control.strMensajetelefono);		
		jQuery("#spanstrMensajee_mail").text(clientes_por_vendedor_control.strMensajee_mail);		
		jQuery("#spanstrMensajemaximo_credito").text(clientes_por_vendedor_control.strMensajemaximo_credito);		
		jQuery("#spanstrMensajecodigovendedores").text(clientes_por_vendedor_control.strMensajecodigovendedores);		
		jQuery("#spanstrMensajenombre").text(clientes_por_vendedor_control.strMensajenombre);		
		jQuery("#spanstrMensajemonto").text(clientes_por_vendedor_control.strMensajemonto);		
		jQuery("#spanstrMensajenumero").text(clientes_por_vendedor_control.strMensajenumero);		
		jQuery("#spanstrMensajetermino").text(clientes_por_vendedor_control.strMensajetermino);		
		jQuery("#spanstrMensajefecha").text(clientes_por_vendedor_control.strMensajefecha);		
	}
	
	actualizarCssBotonesMantenimiento(clientes_por_vendedor_control) {
		jQuery("#tdbtnNuevoclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosclientes_por_vendedor").css("display",clientes_por_vendedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarclientes_por_vendedor").css("visibility",clientes_por_vendedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
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
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				clientes_por_vendedor_funcion1.validarFormularioJQuery(clientes_por_vendedor_constante1);
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
		
		
		
		if(clientes_por_vendedor_control.strPermisoActualizar!=null) {
			jQuery("#tdclientes_por_vendedorActualizarToolBar").css("display",clientes_por_vendedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdclientes_por_vendedorEliminarToolBar").css("display",clientes_por_vendedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trclientes_por_vendedorElementos").css("display",clientes_por_vendedor_control.strVisibleTablaElementos);
		
		jQuery("#trclientes_por_vendedorAcciones").css("display",clientes_por_vendedor_control.strVisibleTablaAcciones);
		jQuery("#trclientes_por_vendedorParametrosAcciones").css("display",clientes_por_vendedor_control.strVisibleTablaAcciones);
		
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
			
			//} else {
				//if(clientes_por_vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(clientes_por_vendedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
						//clientes_por_vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(clientes_por_vendedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(clientes_por_vendedor_constante1.BIG_ID_ACTUAL,"clientes_por_vendedor","cuentascobrar","report",clientes_por_vendedor_funcion1,clientes_por_vendedor_webcontrol1,clientes_por_vendedor_constante1);
						//clientes_por_vendedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
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