//<script type="text/javascript" language="javascript">



//var imagen_documento_cuenta_cobrarJQueryPaginaWebInteraccion= function (imagen_documento_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_documento_cuenta_cobrar_constante,imagen_documento_cuenta_cobrar_constante1} from '../util/imagen_documento_cuenta_cobrar_constante.js';

import {imagen_documento_cuenta_cobrar_funcion,imagen_documento_cuenta_cobrar_funcion1} from '../util/imagen_documento_cuenta_cobrar_form_funcion.js';


class imagen_documento_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	imagen_documento_cuenta_cobrar_control=null;
	imagen_documento_cuenta_cobrar_controlInicial=null;
	imagen_documento_cuenta_cobrar_controlAuxiliar=null;
		
	//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_documento_cuenta_cobrar_control) {
		super();
		
		this.imagen_documento_cuenta_cobrar_control=imagen_documento_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_control.action=="index" || imagen_documento_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control);
			
		} 
		
		
		
	
		else if(imagen_documento_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control);	
		
		} else if(imagen_documento_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control);		
		}
	
	
		
		
		else if(imagen_documento_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_cobrar_control);		
		
		} 
		//else if(imagen_documento_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_cobrar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_documento_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_documento_cuenta_cobrar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_documento_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);	
		
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_documento_cuenta_cobrar_control) {
		//FORMULARIO
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);	
		//COMBOS FK
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control);
		}
		
		if(imagen_documento_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_documento_cuenta_cobrarReturnGeneral",JSON.stringify(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"imagen_documento_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_cobrar");
			}			
			
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(false,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm(imagen_documento_cuenta_cobrar_constante1)==true) {
			window.opener.imagen_documento_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		imagen_documento_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_documento_cuenta_cobrar_control.strAuxiliarTipo,imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm(imagen_documento_cuenta_cobrar_constante1)==true) {
			window.opener.imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control) {
		this.imagen_documento_cuenta_cobrar_controlInicial=imagen_documento_cuenta_cobrar_control;
			
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_documento_cuenta_cobrar_control.strStyleDivArbol,imagen_documento_cuenta_cobrar_control.strStyleDivContent
																,imagen_documento_cuenta_cobrar_control.strStyleDivOpcionesBanner,imagen_documento_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,imagen_documento_cuenta_cobrar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_documento_cuenta_cobrar_control.tiposReportes,imagen_documento_cuenta_cobrar_control.tiposReporte
															 	,imagen_documento_cuenta_cobrar_control.tiposPaginacion,imagen_documento_cuenta_cobrar_control.tiposAcciones
																,imagen_documento_cuenta_cobrar_control.tiposColumnasSelect,imagen_documento_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_documento_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_cobrar_control) {
	
		var indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_documento_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_cuenta_cobrarFK(imagen_documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control) {
		jQuery("#tdimagen_documento_cuenta_cobrarNuevo").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trimagen_documento_cuenta_cobrarElementos").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trimagen_documento_cuenta_cobrarAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_cobrarParametrosAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_documento_cuenta_cobrar_control);
				
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_documento_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_documento_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_documento_cuenta_cobrar_control) {
	
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.versionRow);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_imagen").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_imagen);
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-imagen").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.imagen);
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar!=null && imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").select2("val", null);
			if(jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-nro_documento").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.nro_documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_documento_cuenta_cobrar","cuentascobrar","","form_imagen_documento_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_documento_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(imagen_documento_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_documento_cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_documento_cuenta_cobrar_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeimagen").text(imagen_documento_cuenta_cobrar_control.strMensajeimagen);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(imagen_documento_cuenta_cobrar_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajenro_documento").text(imagen_documento_cuenta_cobrar_control.strMensajenro_documento);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_documento_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevoimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_documento_cuenta_cobrar").css("visibility",imagen_documento_cuenta_cobrar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

		if(imagen_documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_documento_cuenta_cobrar_control.idFilaTablaActual+"_4",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_documento_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_cobrar_funcion1.validarFormularioJQuery(imagen_documento_cuenta_cobrar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_documento_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_documento_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,"imagen_documento_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				imagen_documento_cuenta_cobrar_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control) {
		
		
		
		if(imagen_documento_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_documento_cuenta_cobrarActualizarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_documento_cuenta_cobrarEliminarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_documento_cuenta_cobrarElementos").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_documento_cuenta_cobrarAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trimagen_documento_cuenta_cobrarParametrosAcciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPagina").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPaginaToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trimagen_documento_cuenta_cobrarAccionesRelaciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Documentos Cuentas por Cobrares";
		sTituloBanner+=" - " + imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_documento_cuenta_cobrarRelacionesToolBar").css("display",imagen_documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_documento_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_documento_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_documento_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_documento_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
						//imagen_documento_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_documento_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_documento_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
						//imagen_documento_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_documento_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
	}
}

var imagen_documento_cuenta_cobrar_webcontrol1 = new imagen_documento_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_documento_cuenta_cobrar_webcontrol,imagen_documento_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_documento_cuenta_cobrar_webcontrol1 = imagen_documento_cuenta_cobrar_webcontrol1;


if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>