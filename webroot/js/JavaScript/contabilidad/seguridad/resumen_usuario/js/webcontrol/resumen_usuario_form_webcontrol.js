//<script type="text/javascript" language="javascript">



//var resumen_usuarioJQueryPaginaWebInteraccion= function (resumen_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {resumen_usuario_constante,resumen_usuario_constante1} from '../util/resumen_usuario_constante.js';

import {resumen_usuario_funcion,resumen_usuario_funcion1} from '../util/resumen_usuario_form_funcion.js';


class resumen_usuario_webcontrol extends GeneralEntityWebControl {
	
	resumen_usuario_control=null;
	resumen_usuario_controlInicial=null;
	resumen_usuario_controlAuxiliar=null;
		
	//if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(resumen_usuario_control) {
		super();
		
		this.resumen_usuario_control=resumen_usuario_control;
	}
		
	actualizarVariablesPagina(resumen_usuario_control) {
		
		if(resumen_usuario_control.action=="index" || resumen_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(resumen_usuario_control);
			
		} 
		
		
		
	
		else if(resumen_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(resumen_usuario_control);	
		
		} else if(resumen_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control);		
		}
	
	
		
		
		else if(resumen_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(resumen_usuario_control);		
		
		} 
		//else if(resumen_usuario_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(resumen_usuario_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + resumen_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(resumen_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(resumen_usuario_control) {
		this.actualizarPaginaAccionesGenerales(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(resumen_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(resumen_usuario_control);
		this.actualizarPaginaOrderBy(resumen_usuario_control);
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
		this.actualizarPaginaAreaBusquedas(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(resumen_usuario_control) {
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(resumen_usuario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(resumen_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(resumen_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);	
		
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(resumen_usuario_control) {
		//FORMULARIO
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(resumen_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);	
		//COMBOS FK
		if(resumen_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(resumen_usuario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(resumen_usuario_control) {
		
		if(resumen_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(resumen_usuario_control);
		}
		
		if(resumen_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(resumen_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(resumen_usuario_control) {
		if(resumen_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("resumen_usuarioReturnGeneral",JSON.stringify(resumen_usuario_control.resumen_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && resumen_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(resumen_usuario_control, mostrar) {
		
		if(mostrar==true) {
			resumen_usuario_funcion1.resaltarRestaurarDivsPagina(false,"resumen_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				resumen_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"resumen_usuario");
			}			
			
			resumen_usuario_funcion1.mostrarDivMensaje(true,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			resumen_usuario_funcion1.mostrarDivMensaje(false,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_funcion1.esPaginaForm(resumen_usuario_constante1)==true) {
			window.opener.resumen_usuario_webcontrol1.actualizarPaginaTablaDatos(resumen_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(resumen_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(resumen_usuario_control) {
		resumen_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(resumen_usuario_control.strAuxiliarUrlPagina);
				
		resumen_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(resumen_usuario_control.strAuxiliarTipo,resumen_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(resumen_usuario_control) {
		resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
			
		if(resumen_usuario_funcion1.esPaginaForm(resumen_usuario_constante1)==true) {
			window.opener.resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(resumen_usuario_control) {
		this.resumen_usuario_controlInicial=resumen_usuario_control;
			
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(resumen_usuario_control.strStyleDivArbol,resumen_usuario_control.strStyleDivContent
																,resumen_usuario_control.strStyleDivOpcionesBanner,resumen_usuario_control.strStyleDivExpandirColapsar
																,resumen_usuario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(resumen_usuario_control) {
		this.actualizarCssBotonesPagina(resumen_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(resumen_usuario_control.tiposReportes,resumen_usuario_control.tiposReporte
															 	,resumen_usuario_control.tiposPaginacion,resumen_usuario_control.tiposAcciones
																,resumen_usuario_control.tiposColumnasSelect,resumen_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(resumen_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(resumen_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(resumen_usuario_control) {
	
		var indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(resumen_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(resumen_usuario_control.strRecargarFkTiposNinguno!=null && resumen_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && resumen_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(resumen_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTiposNinguno,",")) { 
					resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(resumen_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,resumen_usuario_funcion1,resumen_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(resumen_usuario_control) {
		jQuery("#tdresumen_usuarioNuevo").css("display",resumen_usuario_control.strPermisoNuevo);
		jQuery("#trresumen_usuarioElementos").css("display",resumen_usuario_control.strVisibleTablaElementos);
		jQuery("#trresumen_usuarioAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
		jQuery("#trresumen_usuarioParametrosAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(resumen_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(resumen_usuario_control);
				
		if(resumen_usuario_control.resumen_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(resumen_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(resumen_usuario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(resumen_usuario_control) {
	
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id").val(resumen_usuario_control.resumen_usuarioActual.id);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-created_at").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-updated_at").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		
		if(resumen_usuario_control.resumen_usuarioActual.id_usuario!=null && resumen_usuario_control.resumen_usuarioActual.id_usuario>-1){
			if(jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != resumen_usuario_control.resumen_usuarioActual.id_usuario) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(resumen_usuario_control.resumen_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_ingresos").val(resumen_usuario_control.resumen_usuarioActual.numero_ingresos);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_error_ingreso").val(resumen_usuario_control.resumen_usuarioActual.numero_error_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_intentos").val(resumen_usuario_control.resumen_usuarioActual.numero_intentos);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_cierres").val(resumen_usuario_control.resumen_usuarioActual.numero_cierres);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_reinicios").val(resumen_usuario_control.resumen_usuarioActual.numero_reinicios);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-numero_ingreso_actual").val(resumen_usuario_control.resumen_usuarioActual.numero_ingreso_actual);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_ingreso").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_error_ingreso").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_error_ingreso);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_intento").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_intento);
		jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-fecha_ultimo_cierre").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_cierre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+resumen_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("resumen_usuario","seguridad","","form_resumen_usuario",formulario,"","",paraEventoTabla,idFilaTabla,resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	actualizarSpanMensajesCampos(resumen_usuario_control) {
		jQuery("#spanstrMensajeid").text(resumen_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(resumen_usuario_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(resumen_usuario_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_usuario").text(resumen_usuario_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero_ingresos").text(resumen_usuario_control.strMensajenumero_ingresos);		
		jQuery("#spanstrMensajenumero_error_ingreso").text(resumen_usuario_control.strMensajenumero_error_ingreso);		
		jQuery("#spanstrMensajenumero_intentos").text(resumen_usuario_control.strMensajenumero_intentos);		
		jQuery("#spanstrMensajenumero_cierres").text(resumen_usuario_control.strMensajenumero_cierres);		
		jQuery("#spanstrMensajenumero_reinicios").text(resumen_usuario_control.strMensajenumero_reinicios);		
		jQuery("#spanstrMensajenumero_ingreso_actual").text(resumen_usuario_control.strMensajenumero_ingreso_actual);		
		jQuery("#spanstrMensajefecha_ultimo_ingreso").text(resumen_usuario_control.strMensajefecha_ultimo_ingreso);		
		jQuery("#spanstrMensajefecha_ultimo_error_ingreso").text(resumen_usuario_control.strMensajefecha_ultimo_error_ingreso);		
		jQuery("#spanstrMensajefecha_ultimo_intento").text(resumen_usuario_control.strMensajefecha_ultimo_intento);		
		jQuery("#spanstrMensajefecha_ultimo_cierre").text(resumen_usuario_control.strMensajefecha_ultimo_cierre);		
	}
	
	actualizarCssBotonesMantenimiento(resumen_usuario_control) {
		jQuery("#tdbtnNuevoresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoresumen_usuario").css("display",resumen_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarresumen_usuario").css("display",resumen_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarresumen_usuario").css("display",resumen_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosresumen_usuario").css("display",resumen_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarresumen_usuario").css("visibility",resumen_usuario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(resumen_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario",resumen_usuario_control.usuariosFK);

		if(resumen_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+resumen_usuario_control.idFilaTablaActual+"_3",resumen_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(resumen_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(resumen_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(resumen_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != resumen_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(resumen_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//resumen_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.setDefectoValorCombosusuariosFK(resumen_usuario_control);
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
	onLoadCombosEventosFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				resumen_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(resumen_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				resumen_usuario_funcion1.validarFormularioJQuery(resumen_usuario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("resumen_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("resumen_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(resumen_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,"resumen_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				resumen_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(resumen_usuario_control) {
		
		
		
		if(resumen_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdresumen_usuarioActualizarToolBar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdresumen_usuarioEliminarToolBar").css("display",resumen_usuario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trresumen_usuarioElementos").css("display",resumen_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trresumen_usuarioAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
		jQuery("#trresumen_usuarioParametrosAcciones").css("display",resumen_usuario_control.strVisibleTablaAcciones);
		
		jQuery("#tdresumen_usuarioCerrarPagina").css("display",resumen_usuario_control.strPermisoPopup);		
		jQuery("#tdresumen_usuarioCerrarPaginaToolBar").css("display",resumen_usuario_control.strPermisoPopup);
		//jQuery("#trresumen_usuarioAccionesRelaciones").css("display",resumen_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=resumen_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + resumen_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + resumen_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Resumen Usuarios";
		sTituloBanner+=" - " + resumen_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + resumen_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdresumen_usuarioRelacionesToolBar").css("display",resumen_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosresumen_usuario").css("display",resumen_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		resumen_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		resumen_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarEventosControles();
		
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			resumen_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(resumen_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				resumen_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(resumen_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(resumen_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(resumen_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
						//resumen_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(resumen_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(resumen_usuario_constante1.BIG_ID_ACTUAL,"resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
						//resumen_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			resumen_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
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

var resumen_usuario_webcontrol1 = new resumen_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {resumen_usuario_webcontrol,resumen_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.resumen_usuario_webcontrol1 = resumen_usuario_webcontrol1;


if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = resumen_usuario_webcontrol1.onLoadWindow; 
}

//</script>