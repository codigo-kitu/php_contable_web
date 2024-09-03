//<script type="text/javascript" language="javascript">



//var imagen_documento_cuenta_pagarJQueryPaginaWebInteraccion= function (imagen_documento_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_documento_cuenta_pagar_constante,imagen_documento_cuenta_pagar_constante1} from '../util/imagen_documento_cuenta_pagar_constante.js';

import {imagen_documento_cuenta_pagar_funcion,imagen_documento_cuenta_pagar_funcion1} from '../util/imagen_documento_cuenta_pagar_form_funcion.js';


class imagen_documento_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	imagen_documento_cuenta_pagar_control=null;
	imagen_documento_cuenta_pagar_controlInicial=null;
	imagen_documento_cuenta_pagar_controlAuxiliar=null;
		
	//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_documento_cuenta_pagar_control) {
		super();
		
		this.imagen_documento_cuenta_pagar_control=imagen_documento_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(imagen_documento_cuenta_pagar_control) {
		
		if(imagen_documento_cuenta_pagar_control.action=="index" || imagen_documento_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_pagar_control);
			
		} 
		
		
		
	
		else if(imagen_documento_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_pagar_control);	
		
		} else if(imagen_documento_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_pagar_control);		
		}
	
	
		
		
		else if(imagen_documento_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_pagar_control);		
		
		} else if(imagen_documento_cuenta_pagar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_pagar_control);		
		
		} 
		//else if(imagen_documento_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_pagar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_documento_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_pagar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_documento_cuenta_pagar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_pagar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		
		//COMBOS FK
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_pagar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);	
		
		//COMBOS FK
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_pagar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);	
		//COMBOS FK
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control) {
		
		if(imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_pagar_control);
		}
		
		if(imagen_documento_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_documento_cuenta_pagarReturnGeneral",JSON.stringify(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"imagen_documento_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_pagar");
			}			
			
			imagen_documento_cuenta_pagar_funcion1.mostrarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensaje,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_documento_cuenta_pagar_funcion1.mostrarDivMensaje(false,imagen_documento_cuenta_pagar_control.strAuxiliarMensaje,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_funcion1.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			window.opener.imagen_documento_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control) {
		imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		imagen_documento_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_documento_cuenta_pagar_control.strAuxiliarTipo,imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_documento_cuenta_pagar_control) {
		imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(imagen_documento_cuenta_pagar_funcion1.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			window.opener.imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_documento_cuenta_pagar_control) {
		this.imagen_documento_cuenta_pagar_controlInicial=imagen_documento_cuenta_pagar_control;
			
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_documento_cuenta_pagar_control.strStyleDivArbol,imagen_documento_cuenta_pagar_control.strStyleDivContent
																,imagen_documento_cuenta_pagar_control.strStyleDivOpcionesBanner,imagen_documento_cuenta_pagar_control.strStyleDivExpandirColapsar
																,imagen_documento_cuenta_pagar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(imagen_documento_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_documento_cuenta_pagar_control.tiposReportes,imagen_documento_cuenta_pagar_control.tiposReporte
															 	,imagen_documento_cuenta_pagar_control.tiposPaginacion,imagen_documento_cuenta_pagar_control.tiposAcciones
																,imagen_documento_cuenta_pagar_control.tiposColumnasSelect,imagen_documento_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_documento_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_pagar_control) {
	
		var indexPosition=imagen_documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_documento_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_pagar_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					imagen_documento_cuenta_pagar_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_cuenta_pagarFK(imagen_documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control) {
		jQuery("#tdimagen_documento_cuenta_pagarNuevo").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trimagen_documento_cuenta_pagarElementos").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trimagen_documento_cuenta_pagarAcciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_pagarParametrosAcciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_documento_cuenta_pagar_control);
				
		if(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_documento_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_documento_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_documento_cuenta_pagar_control) {
	
		jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id);
		jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-created_at").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.versionRow);
		jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-updated_at").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.versionRow);
		jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-imagen").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.imagen);
		
		if(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar!=null && imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar) {
				jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-nro_documento").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.nro_documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_documento_cuenta_pagar","cuentaspagar","","form_imagen_documento_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_documento_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(imagen_documento_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_documento_cuenta_pagar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_documento_cuenta_pagar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeimagen").text(imagen_documento_cuenta_pagar_control.strMensajeimagen);		
		jQuery("#spanstrMensajeid_documento_cuenta_pagar").text(imagen_documento_cuenta_pagar_control.strMensajeid_documento_cuenta_pagar);		
		jQuery("#spanstrMensajenro_documento").text(imagen_documento_cuenta_pagar_control.strMensajenro_documento);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_documento_cuenta_pagar_control) {
		jQuery("#tdbtnNuevoimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_documento_cuenta_pagar").css("visibility",imagen_documento_cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);

		if(imagen_documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_documento_cuenta_pagar_control.idFilaTablaActual+"_4",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_documento_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_pagar_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
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
	onLoadCombosEventosFK(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_pagar_funcion1.validarFormularioJQuery(imagen_documento_cuenta_pagar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_documento_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_documento_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,"imagen_documento_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				imagen_documento_cuenta_pagar_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_documento_cuenta_pagar_control) {
		
		
		
		if(imagen_documento_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_documento_cuenta_pagarActualizarToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_documento_cuenta_pagarEliminarToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_documento_cuenta_pagarElementos").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_documento_cuenta_pagarAcciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_pagarParametrosAcciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_documento_cuenta_pagarCerrarPagina").css("display",imagen_documento_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdimagen_documento_cuenta_pagarCerrarPaginaToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trimagen_documento_cuenta_pagarAccionesRelaciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Documentos Cuentas por Pagares";
		sTituloBanner+=" - " + imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_documento_cuenta_pagarRelacionesToolBar").css("display",imagen_documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_documento_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_documento_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			imagen_documento_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_documento_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_documento_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
						//imagen_documento_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_documento_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_documento_cuenta_pagar_constante1.BIG_ID_ACTUAL,"imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
						//imagen_documento_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_documento_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);	
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

var imagen_documento_cuenta_pagar_webcontrol1 = new imagen_documento_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_documento_cuenta_pagar_webcontrol,imagen_documento_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_documento_cuenta_pagar_webcontrol1 = imagen_documento_cuenta_pagar_webcontrol1;


if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_documento_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>