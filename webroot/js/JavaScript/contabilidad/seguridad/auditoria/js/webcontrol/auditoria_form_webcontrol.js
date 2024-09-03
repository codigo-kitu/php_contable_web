//<script type="text/javascript" language="javascript">



//var auditoriaJQueryPaginaWebInteraccion= function (auditoria_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {auditoria_constante,auditoria_constante1} from '../util/auditoria_constante.js';

import {auditoria_funcion,auditoria_funcion1} from '../util/auditoria_form_funcion.js';


class auditoria_webcontrol extends GeneralEntityWebControl {
	
	auditoria_control=null;
	auditoria_controlInicial=null;
	auditoria_controlAuxiliar=null;
		
	//if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(auditoria_control) {
		super();
		
		this.auditoria_control=auditoria_control;
	}
		
	actualizarVariablesPagina(auditoria_control) {
		
		if(auditoria_control.action=="index" || auditoria_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(auditoria_control);
			
		} 
		
		
		
	
		else if(auditoria_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(auditoria_control);	
		
		} else if(auditoria_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control);		
		}
	
		else if(auditoria_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_control);		
		}
	
		else if(auditoria_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control);
		}
		
		
		else if(auditoria_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(auditoria_control);
		
		} else if(auditoria_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(auditoria_control);
		
		} else if(auditoria_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(auditoria_control);		
		
		} else if(auditoria_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_control);		
		
		} 
		//else if(auditoria_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + auditoria_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(auditoria_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(auditoria_control) {
		this.actualizarPaginaAccionesGenerales(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(auditoria_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_control);
		this.actualizarPaginaOrderBy(auditoria_control);
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
		this.actualizarPaginaAreaBusquedas(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(auditoria_control) {
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(auditoria_control) {
		this.actualizarPaginaTablaDatosAuxiliar(auditoria_control);		
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(auditoria_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(auditoria_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(auditoria_control) {
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(auditoria_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(auditoria_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);	
		
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(auditoria_control) {
		//FORMULARIO
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(auditoria_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);	
		//COMBOS FK
		if(auditoria_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(auditoria_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(auditoria_control) {
		
		if(auditoria_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(auditoria_control);
		}
		
		if(auditoria_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(auditoria_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(auditoria_control) {
		if(auditoria_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("auditoriaReturnGeneral",JSON.stringify(auditoria_control.auditoriaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(auditoria_control) {
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(auditoria_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(auditoria_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(auditoria_control, mostrar) {
		
		if(mostrar==true) {
			auditoria_funcion1.resaltarRestaurarDivsPagina(false,"auditoria");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				auditoria_funcion1.resaltarRestaurarDivMantenimiento(false,"auditoria");
			}			
			
			auditoria_funcion1.mostrarDivMensaje(true,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		
		} else {
			auditoria_funcion1.mostrarDivMensaje(false,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(auditoria_control) {
		if(auditoria_funcion1.esPaginaForm(auditoria_constante1)==true) {
			window.opener.auditoria_webcontrol1.actualizarPaginaTablaDatos(auditoria_control);
		} else {
			this.actualizarPaginaTablaDatos(auditoria_control);
		}
	}
	
	actualizarPaginaAbrirLink(auditoria_control) {
		auditoria_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(auditoria_control.strAuxiliarUrlPagina);
				
		auditoria_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(auditoria_control.strAuxiliarTipo,auditoria_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(auditoria_control) {
		auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
			
		if(auditoria_funcion1.esPaginaForm(auditoria_constante1)==true) {
			window.opener.auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(auditoria_control) {
		this.auditoria_controlInicial=auditoria_control;
			
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(auditoria_control.strStyleDivArbol,auditoria_control.strStyleDivContent
																,auditoria_control.strStyleDivOpcionesBanner,auditoria_control.strStyleDivExpandirColapsar
																,auditoria_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(auditoria_control) {
		this.actualizarCssBotonesPagina(auditoria_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(auditoria_control.tiposReportes,auditoria_control.tiposReporte
															 	,auditoria_control.tiposPaginacion,auditoria_control.tiposAcciones
																,auditoria_control.tiposColumnasSelect,auditoria_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(auditoria_control.tiposRelaciones,auditoria_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(auditoria_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(auditoria_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(auditoria_control);			
	}
	
	actualizarPaginaUsuarioInvitado(auditoria_control) {
	
		var indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(auditoria_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(auditoria_control.strRecargarFkTiposNinguno!=null && auditoria_control.strRecargarFkTiposNinguno!='NINGUNO' && auditoria_control.strRecargarFkTiposNinguno!='') {
			
				if(auditoria_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTiposNinguno,",")) { 
					auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(auditoria_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,auditoria_funcion1,auditoria_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(auditoria_control) {
		jQuery("#tdauditoriaNuevo").css("display",auditoria_control.strPermisoNuevo);
		jQuery("#trauditoriaElementos").css("display",auditoria_control.strVisibleTablaElementos);
		jQuery("#trauditoriaAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
		jQuery("#trauditoriaParametrosAcciones").css("display",auditoria_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(auditoria_control) {
	
		this.actualizarCssBotonesMantenimiento(auditoria_control);
				
		if(auditoria_control.auditoriaActual!=null) {//form
			
			this.actualizarCamposFormulario(auditoria_control);			
		}
						
		this.actualizarSpanMensajesCampos(auditoria_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(auditoria_control) {
	
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id").val(auditoria_control.auditoriaActual.id);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-created_at").val(auditoria_control.auditoriaActual.versionRow);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-updated_at").val(auditoria_control.auditoriaActual.versionRow);
		
		if(auditoria_control.auditoriaActual.id_usuario!=null && auditoria_control.auditoriaActual.id_usuario>-1){
			if(jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != auditoria_control.auditoriaActual.id_usuario) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(auditoria_control.auditoriaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-nombre_tabla").val(auditoria_control.auditoriaActual.nombre_tabla);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_fila").val(auditoria_control.auditoriaActual.id_fila);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-accion").val(auditoria_control.auditoriaActual.accion);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-proceso").val(auditoria_control.auditoriaActual.proceso);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-nombre_pc").val(auditoria_control.auditoriaActual.nombre_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-ip_pc").val(auditoria_control.auditoriaActual.ip_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-usuario_pc").val(auditoria_control.auditoriaActual.usuario_pc);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-fecha_hora").val(auditoria_control.auditoriaActual.fecha_hora);
		jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-observacion").val(auditoria_control.auditoriaActual.observacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+auditoria_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("auditoria","seguridad","","form_auditoria",formulario,"","",paraEventoTabla,idFilaTabla,auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	actualizarSpanMensajesCampos(auditoria_control) {
		jQuery("#spanstrMensajeid").text(auditoria_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(auditoria_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(auditoria_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_usuario").text(auditoria_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenombre_tabla").text(auditoria_control.strMensajenombre_tabla);		
		jQuery("#spanstrMensajeid_fila").text(auditoria_control.strMensajeid_fila);		
		jQuery("#spanstrMensajeaccion").text(auditoria_control.strMensajeaccion);		
		jQuery("#spanstrMensajeproceso").text(auditoria_control.strMensajeproceso);		
		jQuery("#spanstrMensajenombre_pc").text(auditoria_control.strMensajenombre_pc);		
		jQuery("#spanstrMensajeip_pc").text(auditoria_control.strMensajeip_pc);		
		jQuery("#spanstrMensajeusuario_pc").text(auditoria_control.strMensajeusuario_pc);		
		jQuery("#spanstrMensajefecha_hora").text(auditoria_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeobservacion").text(auditoria_control.strMensajeobservacion);		
	}
	
	actualizarCssBotonesMantenimiento(auditoria_control) {
		jQuery("#tdbtnNuevoauditoria").css("visibility",auditoria_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoauditoria").css("display",auditoria_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarauditoria").css("visibility",auditoria_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarauditoria").css("display",auditoria_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarauditoria").css("visibility",auditoria_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarauditoria").css("display",auditoria_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarauditoria").css("visibility",auditoria_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosauditoria").css("visibility",auditoria_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosauditoria").css("display",auditoria_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarauditoria").css("visibility",auditoria_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(auditoria_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario",auditoria_control.usuariosFK);

		if(auditoria_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+auditoria_control.idFilaTablaActual+"_3",auditoria_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(auditoria_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(auditoria_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(auditoria_control.idusuarioDefaultFK>-1 && jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != auditoria_control.idusuarioDefaultFK) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(auditoria_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//auditoria_control
		
	
	}
	
	onLoadCombosDefectoFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.setDefectoValorCombosusuariosFK(auditoria_control);
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
	onLoadCombosEventosFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				auditoria_webcontrol1.registrarComboActionChangeCombosusuariosFK(auditoria_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_funcion1.validarFormularioJQuery(auditoria_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("auditoria");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("auditoria");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(auditoria_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,"auditoria");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				auditoria_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("auditoria");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(auditoria_control) {
		
		
		
		if(auditoria_control.strPermisoActualizar!=null) {
			jQuery("#tdauditoriaActualizarToolBar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdauditoriaEliminarToolBar").css("display",auditoria_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trauditoriaElementos").css("display",auditoria_control.strVisibleTablaElementos);
		
		jQuery("#trauditoriaAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
		jQuery("#trauditoriaParametrosAcciones").css("display",auditoria_control.strVisibleTablaAcciones);
		
		jQuery("#tdauditoriaCerrarPagina").css("display",auditoria_control.strPermisoPopup);		
		jQuery("#tdauditoriaCerrarPaginaToolBar").css("display",auditoria_control.strPermisoPopup);
		//jQuery("#trauditoriaAccionesRelaciones").css("display",auditoria_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=auditoria_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + auditoria_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Auditorias";
		sTituloBanner+=" - " + auditoria_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdauditoriaRelacionesToolBar").css("display",auditoria_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosauditoria").css("display",auditoria_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		auditoria_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		auditoria_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarEventosControles();
		
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			auditoria_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(auditoria_constante1.STR_ES_RELACIONES=="true") {
			if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(auditoria_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(auditoria_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(auditoria_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
						//auditoria_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(auditoria_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(auditoria_constante1.BIG_ID_ACTUAL,"auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
						//auditoria_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			auditoria_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var auditoria_webcontrol1 = new auditoria_webcontrol();

//Para ser llamado desde otro archivo (import)
export {auditoria_webcontrol,auditoria_webcontrol1};

//Para ser llamado desde window.opener
window.auditoria_webcontrol1 = auditoria_webcontrol1;


if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = auditoria_webcontrol1.onLoadWindow; 
}

//</script>