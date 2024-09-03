//<script type="text/javascript" language="javascript">



//var unidadJQueryPaginaWebInteraccion= function (unidad_control) {
//this.,this.,this.

import {unidad_constante,unidad_constante1} from '../util/unidad_constante.js';

import {unidad_funcion,unidad_funcion1} from '../util/unidad_form_funcion.js';


class unidad_webcontrol extends GeneralEntityWebControl {
	
	unidad_control=null;
	unidad_controlInicial=null;
	unidad_controlAuxiliar=null;
		
	//if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(unidad_control) {
		super();
		
		this.unidad_control=unidad_control;
	}
		
	actualizarVariablesPagina(unidad_control) {
		
		if(unidad_control.action=="index" || unidad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(unidad_control);
			
		} 
		
		
		
	
		else if(unidad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(unidad_control);	
		
		} else if(unidad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control);		
		}
	
	
		
		
		else if(unidad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(unidad_control);
		
		} else if(unidad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(unidad_control);
		
		} else if(unidad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(unidad_control);
		
		} else if(unidad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(unidad_control);		
		
		} else if(unidad_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(unidad_control);		
		
		} 
		//else if(unidad_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(unidad_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + unidad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(unidad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(unidad_control) {
		this.actualizarPaginaAccionesGenerales(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(unidad_control) {
		
		this.actualizarPaginaCargaGeneral(unidad_control);
		this.actualizarPaginaOrderBy(unidad_control);
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
		this.actualizarPaginaAreaBusquedas(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(unidad_control) {
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(unidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(unidad_control);		
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(unidad_control) {
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(unidad_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(unidad_control) {
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);
		this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(unidad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(unidad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);	
		
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(unidad_control) {
		//FORMULARIO
		if(unidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(unidad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);	
		//COMBOS FK
		if(unidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(unidad_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(unidad_control) {
		
		if(unidad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(unidad_control);
		}
		
		if(unidad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(unidad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(unidad_control) {
		if(unidad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("unidadReturnGeneral",JSON.stringify(unidad_control.unidadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(unidad_control) {
		if(unidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && unidad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(unidad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(unidad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(unidad_control, mostrar) {
		
		if(mostrar==true) {
			unidad_funcion1.resaltarRestaurarDivsPagina(false,"unidad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				unidad_funcion1.resaltarRestaurarDivMantenimiento(false,"unidad");
			}			
			
			unidad_funcion1.mostrarDivMensaje(true,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		
		} else {
			unidad_funcion1.mostrarDivMensaje(false,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(unidad_control) {
		if(unidad_funcion1.esPaginaForm(unidad_constante1)==true) {
			window.opener.unidad_webcontrol1.actualizarPaginaTablaDatos(unidad_control);
		} else {
			this.actualizarPaginaTablaDatos(unidad_control);
		}
	}
	
	actualizarPaginaAbrirLink(unidad_control) {
		unidad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(unidad_control.strAuxiliarUrlPagina);
				
		unidad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(unidad_control.strAuxiliarTipo,unidad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(unidad_control) {
		unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
			
		if(unidad_funcion1.esPaginaForm(unidad_constante1)==true) {
			window.opener.unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(unidad_control) {
		this.unidad_controlInicial=unidad_control;
			
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(unidad_control.strStyleDivArbol,unidad_control.strStyleDivContent
																,unidad_control.strStyleDivOpcionesBanner,unidad_control.strStyleDivExpandirColapsar
																,unidad_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(unidad_control) {
		this.actualizarCssBotonesPagina(unidad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(unidad_control.tiposReportes,unidad_control.tiposReporte
															 	,unidad_control.tiposPaginacion,unidad_control.tiposAcciones
																,unidad_control.tiposColumnasSelect,unidad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(unidad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(unidad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(unidad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(unidad_control) {
	
		var indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(unidad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(unidad_control.strRecargarFkTiposNinguno!=null && unidad_control.strRecargarFkTiposNinguno!='NINGUNO' && unidad_control.strRecargarFkTiposNinguno!='') {
			
				if(unidad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTiposNinguno,",")) { 
					unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(unidad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,unidad_funcion1,unidad_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(unidad_control) {
		jQuery("#tdunidadNuevo").css("display",unidad_control.strPermisoNuevo);
		jQuery("#trunidadElementos").css("display",unidad_control.strVisibleTablaElementos);
		jQuery("#trunidadAcciones").css("display",unidad_control.strVisibleTablaAcciones);
		jQuery("#trunidadParametrosAcciones").css("display",unidad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(unidad_control) {
	
		this.actualizarCssBotonesMantenimiento(unidad_control);
				
		if(unidad_control.unidadActual!=null) {//form
			
			this.actualizarCamposFormulario(unidad_control);			
		}
						
		this.actualizarSpanMensajesCampos(unidad_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(unidad_control) {
	
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id").val(unidad_control.unidadActual.id);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-version_row").val(unidad_control.unidadActual.versionRow);
		
		if(unidad_control.unidadActual.id_empresa!=null && unidad_control.unidadActual.id_empresa>-1){
			if(jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != unidad_control.unidadActual.id_empresa) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(unidad_control.unidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-codigo").val(unidad_control.unidadActual.codigo);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-nombre").val(unidad_control.unidadActual.nombre);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-defecto_venta").prop('checked',unidad_control.unidadActual.defecto_venta);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-defecto_compra").prop('checked',unidad_control.unidadActual.defecto_compra);
		jQuery("#form"+unidad_constante1.STR_SUFIJO+"-numero_productos").val(unidad_control.unidadActual.numero_productos);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+unidad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("unidad","inventario","","form_unidad",formulario,"","",paraEventoTabla,idFilaTabla,unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	actualizarSpanMensajesCampos(unidad_control) {
		jQuery("#spanstrMensajeid").text(unidad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(unidad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(unidad_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(unidad_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(unidad_control.strMensajenombre);		
		jQuery("#spanstrMensajedefecto_venta").text(unidad_control.strMensajedefecto_venta);		
		jQuery("#spanstrMensajedefecto_compra").text(unidad_control.strMensajedefecto_compra);		
		jQuery("#spanstrMensajenumero_productos").text(unidad_control.strMensajenumero_productos);		
	}
	
	actualizarCssBotonesMantenimiento(unidad_control) {
		jQuery("#tdbtnNuevounidad").css("visibility",unidad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevounidad").css("display",unidad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarunidad").css("visibility",unidad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarunidad").css("display",unidad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarunidad").css("visibility",unidad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarunidad").css("display",unidad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarunidad").css("visibility",unidad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosunidad").css("visibility",unidad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosunidad").css("display",unidad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarunidad").css("visibility",unidad_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(unidad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa",unidad_control.empresasFK);

		if(unidad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+unidad_control.idFilaTablaActual+"_2",unidad_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(unidad_control) {

	};

	
	
	setDefectoValorCombosempresasFK(unidad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(unidad_control.idempresaDefaultFK>-1 && jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != unidad_control.idempresaDefaultFK) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(unidad_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//unidad_control
		
	
	}
	
	onLoadCombosDefectoFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.setDefectoValorCombosempresasFK(unidad_control);
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
	onLoadCombosEventosFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				unidad_webcontrol1.registrarComboActionChangeCombosempresasFK(unidad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				unidad_funcion1.validarFormularioJQuery(unidad_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("unidad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("unidad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(unidad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,"unidad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				unidad_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(unidad_control) {
		
		
		
		if(unidad_control.strPermisoActualizar!=null) {
			jQuery("#tdunidadActualizarToolBar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdunidadEliminarToolBar").css("display",unidad_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trunidadElementos").css("display",unidad_control.strVisibleTablaElementos);
		
		jQuery("#trunidadAcciones").css("display",unidad_control.strVisibleTablaAcciones);
		jQuery("#trunidadParametrosAcciones").css("display",unidad_control.strVisibleTablaAcciones);
		
		jQuery("#tdunidadCerrarPagina").css("display",unidad_control.strPermisoPopup);		
		jQuery("#tdunidadCerrarPaginaToolBar").css("display",unidad_control.strPermisoPopup);
		//jQuery("#trunidadAccionesRelaciones").css("display",unidad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=unidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + unidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + unidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Unidades";
		sTituloBanner+=" - " + unidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + unidad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdunidadRelacionesToolBar").css("display",unidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosunidad").css("display",unidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		unidad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		unidad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarEventosControles();
		
		if(unidad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			unidad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(unidad_constante1.STR_ES_RELACIONES=="true") {
			if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				unidad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(unidad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(unidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(unidad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
						//unidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(unidad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(unidad_constante1.BIG_ID_ACTUAL,"unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
						//unidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			unidad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}
}

var unidad_webcontrol1 = new unidad_webcontrol();

export {unidad_webcontrol,unidad_webcontrol1};

//Para ser llamado desde window.opener
window.unidad_webcontrol1 = unidad_webcontrol1;


if(unidad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = unidad_webcontrol1.onLoadWindow; 
}

//</script>