//<script type="text/javascript" language="javascript">



//var auditoria_detalleJQueryPaginaWebInteraccion= function (auditoria_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {auditoria_detalle_constante,auditoria_detalle_constante1} from '../util/auditoria_detalle_constante.js';

import {auditoria_detalle_funcion,auditoria_detalle_funcion1} from '../util/auditoria_detalle_form_funcion.js';


class auditoria_detalle_webcontrol extends GeneralEntityWebControl {
	
	auditoria_detalle_control=null;
	auditoria_detalle_controlInicial=null;
	auditoria_detalle_controlAuxiliar=null;
		
	//if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(auditoria_detalle_control) {
		super();
		
		this.auditoria_detalle_control=auditoria_detalle_control;
	}
		
	actualizarVariablesPagina(auditoria_detalle_control) {
		
		if(auditoria_detalle_control.action=="index" || auditoria_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(auditoria_detalle_control);
			
		} 
		
		
		
	
		else if(auditoria_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(auditoria_detalle_control);	
		
		} else if(auditoria_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_detalle_control);		
		}
	
	
		
		
		else if(auditoria_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(auditoria_detalle_control);		
		
		} else if(auditoria_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_detalle_control);		
		
		} 
		//else if(auditoria_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + auditoria_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(auditoria_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(auditoria_detalle_control) {
		this.actualizarPaginaAccionesGenerales(auditoria_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(auditoria_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_detalle_control);
		this.actualizarPaginaOrderBy(auditoria_detalle_control);
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_detalle_control);
		this.actualizarPaginaAreaBusquedas(auditoria_detalle_control);
		this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(auditoria_detalle_control) {
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_detalle_control);
		this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);
		this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(auditoria_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_detalle_control);
		this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);
		this.actualizarPaginaFormulario(auditoria_detalle_control);
		this.onLoadCombosDefectoFK(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_detalle_control) {
		//FORMULARIO
		if(auditoria_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(auditoria_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		
		//COMBOS FK
		if(auditoria_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_detalle_control) {
		//FORMULARIO
		if(auditoria_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(auditoria_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);	
		
		//COMBOS FK
		if(auditoria_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(auditoria_detalle_control) {
		//FORMULARIO
		if(auditoria_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);	
		//COMBOS FK
		if(auditoria_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(auditoria_detalle_control) {
		
		if(auditoria_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(auditoria_detalle_control);
		}
		
		if(auditoria_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(auditoria_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(auditoria_detalle_control) {
		if(auditoria_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("auditoria_detalleReturnGeneral",JSON.stringify(auditoria_detalle_control.auditoria_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control) {
		if(auditoria_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(auditoria_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(auditoria_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(auditoria_detalle_control, mostrar) {
		
		if(mostrar==true) {
			auditoria_detalle_funcion1.resaltarRestaurarDivsPagina(false,"auditoria_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				auditoria_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"auditoria_detalle");
			}			
			
			auditoria_detalle_funcion1.mostrarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensaje,auditoria_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			auditoria_detalle_funcion1.mostrarDivMensaje(false,auditoria_detalle_control.strAuxiliarMensaje,auditoria_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(auditoria_detalle_control) {
		if(auditoria_detalle_funcion1.esPaginaForm(auditoria_detalle_constante1)==true) {
			window.opener.auditoria_detalle_webcontrol1.actualizarPaginaTablaDatos(auditoria_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(auditoria_detalle_control) {
		auditoria_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(auditoria_detalle_control.strAuxiliarUrlPagina);
				
		auditoria_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(auditoria_detalle_control.strAuxiliarTipo,auditoria_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(auditoria_detalle_control) {
		auditoria_detalle_funcion1.resaltarRestaurarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensajeAlert,auditoria_detalle_control.strAuxiliarCssMensaje);
			
		if(auditoria_detalle_funcion1.esPaginaForm(auditoria_detalle_constante1)==true) {
			window.opener.auditoria_detalle_funcion1.resaltarRestaurarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensajeAlert,auditoria_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(auditoria_detalle_control) {
		this.auditoria_detalle_controlInicial=auditoria_detalle_control;
			
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(auditoria_detalle_control.strStyleDivArbol,auditoria_detalle_control.strStyleDivContent
																,auditoria_detalle_control.strStyleDivOpcionesBanner,auditoria_detalle_control.strStyleDivExpandirColapsar
																,auditoria_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(auditoria_detalle_control) {
		this.actualizarCssBotonesPagina(auditoria_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(auditoria_detalle_control.tiposReportes,auditoria_detalle_control.tiposReporte
															 	,auditoria_detalle_control.tiposPaginacion,auditoria_detalle_control.tiposAcciones
																,auditoria_detalle_control.tiposColumnasSelect,auditoria_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(auditoria_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(auditoria_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(auditoria_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(auditoria_detalle_control) {
	
		var indexPosition=auditoria_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=auditoria_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(auditoria_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 
				auditoria_detalle_webcontrol1.cargarCombosauditoriasFK(auditoria_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(auditoria_detalle_control.strRecargarFkTiposNinguno!=null && auditoria_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && auditoria_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(auditoria_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTiposNinguno,",")) { 
					auditoria_detalle_webcontrol1.cargarCombosauditoriasFK(auditoria_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaauditoriaFK(auditoria_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,auditoria_detalle_funcion1,auditoria_detalle_control.auditoriasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(auditoria_detalle_control) {
		jQuery("#tdauditoria_detalleNuevo").css("display",auditoria_detalle_control.strPermisoNuevo);
		jQuery("#trauditoria_detalleElementos").css("display",auditoria_detalle_control.strVisibleTablaElementos);
		jQuery("#trauditoria_detalleAcciones").css("display",auditoria_detalle_control.strVisibleTablaAcciones);
		jQuery("#trauditoria_detalleParametrosAcciones").css("display",auditoria_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(auditoria_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(auditoria_detalle_control);
				
		if(auditoria_detalle_control.auditoria_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(auditoria_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(auditoria_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(auditoria_detalle_control) {
	
		jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id").val(auditoria_detalle_control.auditoria_detalleActual.id);
		jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-version_row").val(auditoria_detalle_control.auditoria_detalleActual.versionRow);
		
		if(auditoria_detalle_control.auditoria_detalleActual.id_auditoria!=null && auditoria_detalle_control.auditoria_detalleActual.id_auditoria>-1){
			if(jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val() != auditoria_detalle_control.auditoria_detalleActual.id_auditoria) {
				jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val(auditoria_detalle_control.auditoria_detalleActual.id_auditoria).trigger("change");
			}
		} else { 
			//jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").select2("val", null);
			if(jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-nombre_campo").val(auditoria_detalle_control.auditoria_detalleActual.nombre_campo);
		jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-valor_anterior").val(auditoria_detalle_control.auditoria_detalleActual.valor_anterior);
		jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-valor_actual").val(auditoria_detalle_control.auditoria_detalleActual.valor_actual);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+auditoria_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("auditoria_detalle","seguridad","","form_auditoria_detalle",formulario,"","",paraEventoTabla,idFilaTabla,auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(auditoria_detalle_control) {
		jQuery("#spanstrMensajeid").text(auditoria_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(auditoria_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_auditoria").text(auditoria_detalle_control.strMensajeid_auditoria);		
		jQuery("#spanstrMensajenombre_campo").text(auditoria_detalle_control.strMensajenombre_campo);		
		jQuery("#spanstrMensajevalor_anterior").text(auditoria_detalle_control.strMensajevalor_anterior);		
		jQuery("#spanstrMensajevalor_actual").text(auditoria_detalle_control.strMensajevalor_actual);		
	}
	
	actualizarCssBotonesMantenimiento(auditoria_detalle_control) {
		jQuery("#tdbtnNuevoauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoauditoria_detalle").css("display",auditoria_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarauditoria_detalle").css("display",auditoria_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarauditoria_detalle").css("display",auditoria_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosauditoria_detalle").css("display",auditoria_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarauditoria_detalle").css("visibility",auditoria_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosauditoriasFK(auditoria_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria",auditoria_detalle_control.auditoriasFK);

		if(auditoria_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+auditoria_detalle_control.idFilaTablaActual+"_2",auditoria_detalle_control.auditoriasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria",auditoria_detalle_control.auditoriasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria",auditoria_detalle_control.auditoriasFK);

	};

	
	
	registrarComboActionChangeCombosauditoriasFK(auditoria_detalle_control) {

	};

	
	
	setDefectoValorCombosauditoriasFK(auditoria_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(auditoria_detalle_control.idauditoriaDefaultFK>-1 && jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val() != auditoria_detalle_control.idauditoriaDefaultFK) {
				jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val(auditoria_detalle_control.idauditoriaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val(auditoria_detalle_control.idauditoriaDefaultForeignKey).trigger("change");
			if(jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val(auditoria_detalle_control.idauditoriaDefaultForeignKey).trigger("change");
			if(jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//auditoria_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 
				auditoria_detalle_webcontrol1.setDefectoValorCombosauditoriasFK(auditoria_detalle_control);
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
	onLoadCombosEventosFK(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				auditoria_detalle_webcontrol1.registrarComboActionChangeCombosauditoriasFK(auditoria_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(auditoria_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_detalle_funcion1.validarFormularioJQuery(auditoria_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("auditoria_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("auditoria_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,"auditoria_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("auditoria","id_auditoria","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria_img_busqueda").click(function(){
				auditoria_detalle_webcontrol1.abrirBusquedaParaauditoria("id_auditoria");
				//alert(jQuery('#form-id_auditoria_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(auditoria_detalle_control) {
		
		
		
		if(auditoria_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdauditoria_detalleActualizarToolBar").css("display",auditoria_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdauditoria_detalleEliminarToolBar").css("display",auditoria_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trauditoria_detalleElementos").css("display",auditoria_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trauditoria_detalleAcciones").css("display",auditoria_detalle_control.strVisibleTablaAcciones);
		jQuery("#trauditoria_detalleParametrosAcciones").css("display",auditoria_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdauditoria_detalleCerrarPagina").css("display",auditoria_detalle_control.strPermisoPopup);		
		jQuery("#tdauditoria_detalleCerrarPaginaToolBar").css("display",auditoria_detalle_control.strPermisoPopup);
		//jQuery("#trauditoria_detalleAccionesRelaciones").css("display",auditoria_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=auditoria_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + auditoria_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Auditoria Detalles";
		sTituloBanner+=" - " + auditoria_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdauditoria_detalleRelacionesToolBar").css("display",auditoria_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosauditoria_detalle").css("display",auditoria_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		auditoria_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		auditoria_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		auditoria_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		auditoria_detalle_webcontrol1.registrarEventosControles();
		
		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			auditoria_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(auditoria_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(auditoria_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(auditoria_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(auditoria_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(auditoria_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(auditoria_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
						//auditoria_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(auditoria_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(auditoria_detalle_constante1.BIG_ID_ACTUAL,"auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
						//auditoria_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			auditoria_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);	
	}
}

var auditoria_detalle_webcontrol1 = new auditoria_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {auditoria_detalle_webcontrol,auditoria_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.auditoria_detalle_webcontrol1 = auditoria_detalle_webcontrol1;


if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = auditoria_detalle_webcontrol1.onLoadWindow; 
}

//</script>