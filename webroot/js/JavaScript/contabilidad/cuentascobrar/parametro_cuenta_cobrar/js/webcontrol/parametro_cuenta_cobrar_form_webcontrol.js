//<script type="text/javascript" language="javascript">



//var parametro_cuenta_cobrarJQueryPaginaWebInteraccion= function (parametro_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_cuenta_cobrar_constante,parametro_cuenta_cobrar_constante1} from '../util/parametro_cuenta_cobrar_constante.js';

import {parametro_cuenta_cobrar_funcion,parametro_cuenta_cobrar_funcion1} from '../util/parametro_cuenta_cobrar_form_funcion.js';


class parametro_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	parametro_cuenta_cobrar_control=null;
	parametro_cuenta_cobrar_controlInicial=null;
	parametro_cuenta_cobrar_controlAuxiliar=null;
		
	//if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_cuenta_cobrar_control) {
		super();
		
		this.parametro_cuenta_cobrar_control=parametro_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(parametro_cuenta_cobrar_control) {
		
		if(parametro_cuenta_cobrar_control.action=="index" || parametro_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_cuenta_cobrar_control);
			
		} 
		
		
		
	
		else if(parametro_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_cuenta_cobrar_control);	
		
		} else if(parametro_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuenta_cobrar_control);		
		}
	
	
		
		
		else if(parametro_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_cuenta_cobrar_control);		
		
		} else if(parametro_cuenta_cobrar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuenta_cobrar_control);		
		
		} 
		//else if(parametro_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_cuenta_cobrar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(parametro_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(parametro_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuenta_cobrar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_cuenta_cobrar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_cuenta_cobrar_control) {
		//FORMULARIO
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		
		//COMBOS FK
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_cuenta_cobrar_control) {
		//FORMULARIO
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);	
		
		//COMBOS FK
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_cuenta_cobrar_control) {
		//FORMULARIO
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);	
		//COMBOS FK
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_cuenta_cobrar_control) {
		
		if(parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_cuenta_cobrar_control);
		}
		
		if(parametro_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_cuenta_cobrarReturnGeneral",JSON.stringify(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"parametro_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_cuenta_cobrar");
			}			
			
			parametro_cuenta_cobrar_funcion1.mostrarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensaje,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_cuenta_cobrar_funcion1.mostrarDivMensaje(false,parametro_cuenta_cobrar_control.strAuxiliarMensaje,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_funcion1.esPaginaForm(parametro_cuenta_cobrar_constante1)==true) {
			window.opener.parametro_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control) {
		parametro_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		parametro_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_cuenta_cobrar_control.strAuxiliarTipo,parametro_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_cuenta_cobrar_control) {
		parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(parametro_cuenta_cobrar_funcion1.esPaginaForm(parametro_cuenta_cobrar_constante1)==true) {
			window.opener.parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_cuenta_cobrar_control) {
		this.parametro_cuenta_cobrar_controlInicial=parametro_cuenta_cobrar_control;
			
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_cuenta_cobrar_control.strStyleDivArbol,parametro_cuenta_cobrar_control.strStyleDivContent
																,parametro_cuenta_cobrar_control.strStyleDivOpcionesBanner,parametro_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,parametro_cuenta_cobrar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(parametro_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_cuenta_cobrar_control.tiposReportes,parametro_cuenta_cobrar_control.tiposReporte
															 	,parametro_cuenta_cobrar_control.tiposPaginacion,parametro_cuenta_cobrar_control.tiposAcciones
																,parametro_cuenta_cobrar_control.tiposColumnasSelect,parametro_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_cuenta_cobrar_control) {
	
		var indexPosition=parametro_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				parametro_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(parametro_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(parametro_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control) {
		jQuery("#tdparametro_cuenta_cobrarNuevo").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trparametro_cuenta_cobrarElementos").css("display",parametro_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trparametro_cuenta_cobrarAcciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuenta_cobrarParametrosAcciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_cuenta_cobrar_control);
				
		if(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_cuenta_cobrar_control) {
	
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-created_at").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.versionRow);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-updated_at").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.versionRow);
		
		if(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa!=null && parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa) {
				jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_cuenta_cobrar").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_cuenta_cobrar);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_debito").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_debito);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_credito").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_credito);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_pago").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_pago);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-mostrar_anulado").prop('checked',parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.mostrar_anulado);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-numero_cliente").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_cliente);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-con_cliente_inactivo").prop('checked',parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.con_cliente_inactivo);
		jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-nombre_registro_tributario").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.nombre_registro_tributario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_cuenta_cobrar","cuentascobrar","","form_parametro_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(parametro_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(parametro_cuenta_cobrar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(parametro_cuenta_cobrar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_cuenta_cobrar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajenumero_cuenta_cobrar").text(parametro_cuenta_cobrar_control.strMensajenumero_cuenta_cobrar);		
		jQuery("#spanstrMensajenumero_debito").text(parametro_cuenta_cobrar_control.strMensajenumero_debito);		
		jQuery("#spanstrMensajenumero_credito").text(parametro_cuenta_cobrar_control.strMensajenumero_credito);		
		jQuery("#spanstrMensajenumero_pago").text(parametro_cuenta_cobrar_control.strMensajenumero_pago);		
		jQuery("#spanstrMensajemostrar_anulado").text(parametro_cuenta_cobrar_control.strMensajemostrar_anulado);		
		jQuery("#spanstrMensajenumero_cliente").text(parametro_cuenta_cobrar_control.strMensajenumero_cliente);		
		jQuery("#spanstrMensajecon_cliente_inactivo").text(parametro_cuenta_cobrar_control.strMensajecon_cliente_inactivo);		
		jQuery("#spanstrMensajenombre_registro_tributario").text(parametro_cuenta_cobrar_control.strMensajenombre_registro_tributario);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevoparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_cuenta_cobrar").css("visibility",parametro_cuenta_cobrar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",parametro_cuenta_cobrar_control.empresasFK);

		if(parametro_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_cuenta_cobrar_control.idFilaTablaActual+"_3",parametro_cuenta_cobrar_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				parametro_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(parametro_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuenta_cobrar_funcion1.validarFormularioJQuery(parametro_cuenta_cobrar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,"parametro_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_cuenta_cobrar_control) {
		
		
		
		if(parametro_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_cuenta_cobrarActualizarToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_cuenta_cobrarEliminarToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_cuenta_cobrarElementos").css("display",parametro_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_cuenta_cobrarAcciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_cuenta_cobrarParametrosAcciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_cuenta_cobrarCerrarPagina").css("display",parametro_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdparametro_cuenta_cobrarCerrarPaginaToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trparametro_cuenta_cobrarAccionesRelaciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Cuentas Cobrars";
		sTituloBanner+=" - " + parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_cuenta_cobrarRelacionesToolBar").css("display",parametro_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
						//parametro_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
						//parametro_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);	
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

var parametro_cuenta_cobrar_webcontrol1 = new parametro_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_cuenta_cobrar_webcontrol,parametro_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_cuenta_cobrar_webcontrol1 = parametro_cuenta_cobrar_webcontrol1;


if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>