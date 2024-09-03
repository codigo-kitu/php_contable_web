//<script type="text/javascript" language="javascript">



//var parametro_generalJQueryPaginaWebInteraccion= function (parametro_general_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_general_constante,parametro_general_constante1} from '../util/parametro_general_constante.js';

import {parametro_general_funcion,parametro_general_funcion1} from '../util/parametro_general_form_funcion.js';


class parametro_general_webcontrol extends GeneralEntityWebControl {
	
	parametro_general_control=null;
	parametro_general_controlInicial=null;
	parametro_general_controlAuxiliar=null;
		
	//if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_control) {
		super();
		
		this.parametro_general_control=parametro_general_control;
	}
		
	actualizarVariablesPagina(parametro_general_control) {
		
		if(parametro_general_control.action=="index" || parametro_general_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_control);
			
		} 
		
		
		
	
		else if(parametro_general_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_control);	
		
		} else if(parametro_general_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control);		
		}
	
	
		
		
		else if(parametro_general_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_general_control);
		
		} else if(parametro_general_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_general_control);		
		
		} else if(parametro_general_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_control);		
		
		} 
		//else if(parametro_general_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_general_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_general_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_general_control) {
		this.actualizarPaginaAccionesGenerales(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_general_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_control);
		this.actualizarPaginaOrderBy(parametro_general_control);
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_control) {
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_general_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_control);		
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_general_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);
		this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);	
		
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_general_control) {
		//FORMULARIO
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);	
		//COMBOS FK
		if(parametro_general_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_general_control) {
		
		if(parametro_general_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_control);
		}
		
		if(parametro_general_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_general_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_general_control) {
		if(parametro_general_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_generalReturnGeneral",JSON.stringify(parametro_general_control.parametro_generalReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_control) {
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_general_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_funcion1.resaltarRestaurarDivsPagina(false,"parametro_general");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_general");
			}			
			
			parametro_general_funcion1.mostrarDivMensaje(true,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_funcion1.mostrarDivMensaje(false,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_control) {
		if(parametro_general_funcion1.esPaginaForm(parametro_general_constante1)==true) {
			window.opener.parametro_general_webcontrol1.actualizarPaginaTablaDatos(parametro_general_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_control) {
		parametro_general_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_control.strAuxiliarUrlPagina);
				
		parametro_general_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_control.strAuxiliarTipo,parametro_general_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_control) {
		parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
			
		if(parametro_general_funcion1.esPaginaForm(parametro_general_constante1)==true) {
			window.opener.parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_general_control) {
		this.parametro_general_controlInicial=parametro_general_control;
			
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_control.strStyleDivArbol,parametro_general_control.strStyleDivContent
																,parametro_general_control.strStyleDivOpcionesBanner,parametro_general_control.strStyleDivExpandirColapsar
																,parametro_general_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_general_control) {
		this.actualizarCssBotonesPagina(parametro_general_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_control.tiposReportes,parametro_general_control.tiposReporte
															 	,parametro_general_control.tiposPaginacion,parametro_general_control.tiposAcciones
																,parametro_general_control.tiposColumnasSelect,parametro_general_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_control) {
	
		var indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_general_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombosmonedasFK(parametro_general_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_control.strRecargarFkTiposNinguno!=null && parametro_general_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
				}

				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
				}

				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombosmonedasFK(parametro_general_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.empresasFK);
	}

	cargarComboEditarTablapaisFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.paissFK);
	}

	cargarComboEditarTablamonedaFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.monedasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_general_control) {
		jQuery("#tdparametro_generalNuevo").css("display",parametro_general_control.strPermisoNuevo);
		jQuery("#trparametro_generalElementos").css("display",parametro_general_control.strVisibleTablaElementos);
		jQuery("#trparametro_generalAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
		jQuery("#trparametro_generalParametrosAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_general_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_general_control);
				
		if(parametro_general_control.parametro_generalActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_general_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_general_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_general_control) {
	
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id").val(parametro_general_control.parametro_generalActual.id);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-version_row").val(parametro_general_control.parametro_generalActual.versionRow);
		
		if(parametro_general_control.parametro_generalActual.id_empresa!=null && parametro_general_control.parametro_generalActual.id_empresa>-1){
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_control.parametro_generalActual.id_empresa) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_control.parametro_generalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_pais!=null && parametro_general_control.parametro_generalActual.id_pais>-1){
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != parametro_general_control.parametro_generalActual.id_pais) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(parametro_general_control.parametro_generalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_modena!=null && parametro_general_control.parametro_generalActual.id_modena>-1){
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val() != parametro_general_control.parametro_generalActual.id_modena) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val(parametro_general_control.parametro_generalActual.id_modena).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").select2("val", null);
			if(jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-simbolo_moneda").val(parametro_general_control.parametro_generalActual.simbolo_moneda);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-numero_decimales").val(parametro_general_control.parametro_generalActual.numero_decimales);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-con_formato_fecha_mda").prop('checked',parametro_general_control.parametro_generalActual.con_formato_fecha_mda);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-con_formato_cantidad_coma").prop('checked',parametro_general_control.parametro_generalActual.con_formato_cantidad_coma);
		jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-iva_porciento").val(parametro_general_control.parametro_generalActual.iva_porciento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_general_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_general","general","","form_parametro_general",formulario,"","",paraEventoTabla,idFilaTabla,parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_general_control) {
		jQuery("#spanstrMensajeid").text(parametro_general_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_general_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_general_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_pais").text(parametro_general_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_modena").text(parametro_general_control.strMensajeid_modena);		
		jQuery("#spanstrMensajesimbolo_moneda").text(parametro_general_control.strMensajesimbolo_moneda);		
		jQuery("#spanstrMensajenumero_decimales").text(parametro_general_control.strMensajenumero_decimales);		
		jQuery("#spanstrMensajecon_formato_fecha_mda").text(parametro_general_control.strMensajecon_formato_fecha_mda);		
		jQuery("#spanstrMensajecon_formato_cantidad_coma").text(parametro_general_control.strMensajecon_formato_cantidad_coma);		
		jQuery("#spanstrMensajeiva_porciento").text(parametro_general_control.strMensajeiva_porciento);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_general_control) {
		jQuery("#tdbtnNuevoparametro_general").css("visibility",parametro_general_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_general").css("display",parametro_general_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_general").css("display",parametro_general_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_general").css("display",parametro_general_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_general").css("visibility",parametro_general_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_general").css("display",parametro_general_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_general").css("visibility",parametro_general_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa",parametro_general_control.empresasFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_2",parametro_general_control.empresasFK);
		}
	};

	cargarCombospaissFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais",parametro_general_control.paissFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_3",parametro_general_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",parametro_general_control.paissFK);

	};

	cargarCombosmonedasFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena",parametro_general_control.monedasFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_4",parametro_general_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena",parametro_general_control.monedasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_general_control) {

	};

	registrarComboActionChangeCombospaissFK(parametro_general_control) {

	};

	registrarComboActionChangeCombosmonedasFK(parametro_general_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idpaisDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != parametro_general_control.idpaisDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(parametro_general_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(parametro_general_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idmonedaDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val() != parametro_general_control.idmonedaDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val(parametro_general_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val(parametro_general_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombospaissFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombosmonedasFK(parametro_general_control);
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
	onLoadCombosEventosFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_general_control);
			//}

			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombospaissFK(parametro_general_control);
			//}

			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombosmonedasFK(parametro_general_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_funcion1.validarFormularioJQuery(parametro_general_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_general_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,"parametro_general");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_modena","contabilidad","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParamoneda("id_modena");
				//alert(jQuery('#form-id_modena_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_control) {
		
		
		
		if(parametro_general_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_generalActualizarToolBar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_generalEliminarToolBar").css("display",parametro_general_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_generalElementos").css("display",parametro_general_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_generalAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
		jQuery("#trparametro_generalParametrosAcciones").css("display",parametro_general_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_generalCerrarPagina").css("display",parametro_general_control.strPermisoPopup);		
		jQuery("#tdparametro_generalCerrarPaginaToolBar").css("display",parametro_general_control.strPermisoPopup);
		//jQuery("#trparametro_generalAccionesRelaciones").css("display",parametro_general_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_general_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_general_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Generales";
		sTituloBanner+=" - " + parametro_general_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_generalRelacionesToolBar").css("display",parametro_general_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_general").css("display",parametro_general_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_general_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_general_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarEventosControles();
		
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_general_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_general_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
						//parametro_general_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_general_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_general_constante1.BIG_ID_ACTUAL,"parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
						//parametro_general_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_general_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
	}
}

var parametro_general_webcontrol1 = new parametro_general_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_general_webcontrol,parametro_general_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_general_webcontrol1 = parametro_general_webcontrol1;


if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_webcontrol1.onLoadWindow; 
}

//</script>