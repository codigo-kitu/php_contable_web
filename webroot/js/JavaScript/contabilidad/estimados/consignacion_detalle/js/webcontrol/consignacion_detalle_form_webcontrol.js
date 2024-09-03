//<script type="text/javascript" language="javascript">



//var consignacion_detalleJQueryPaginaWebInteraccion= function (consignacion_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {consignacion_detalle_constante,consignacion_detalle_constante1} from '../util/consignacion_detalle_constante.js';

import {consignacion_detalle_funcion,consignacion_detalle_funcion1} from '../util/consignacion_detalle_form_funcion.js';


class consignacion_detalle_webcontrol extends GeneralEntityWebControl {
	
	consignacion_detalle_control=null;
	consignacion_detalle_controlInicial=null;
	consignacion_detalle_controlAuxiliar=null;
		
	//if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(consignacion_detalle_control) {
		super();
		
		this.consignacion_detalle_control=consignacion_detalle_control;
	}
		
	actualizarVariablesPagina(consignacion_detalle_control) {
		
		if(consignacion_detalle_control.action=="index" || consignacion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(consignacion_detalle_control);
			
		} 
		
		
		
	
		else if(consignacion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(consignacion_detalle_control);	
		
		} else if(consignacion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_detalle_control);		
		}
	
	
		
		
		else if(consignacion_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(consignacion_detalle_control);		
		
		} else if(consignacion_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_detalle_control);		
		
		} 
		//else if(consignacion_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + consignacion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(consignacion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(consignacion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(consignacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(consignacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_detalle_control);
		this.actualizarPaginaOrderBy(consignacion_detalle_control);
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(consignacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(consignacion_detalle_control) {
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);
		this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(consignacion_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);
		this.actualizarPaginaFormulario(consignacion_detalle_control);
		this.onLoadCombosDefectoFK(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_detalle_control) {
		//FORMULARIO
		if(consignacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(consignacion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		
		//COMBOS FK
		if(consignacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_detalle_control) {
		//FORMULARIO
		if(consignacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(consignacion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);	
		
		//COMBOS FK
		if(consignacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(consignacion_detalle_control) {
		//FORMULARIO
		if(consignacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);	
		//COMBOS FK
		if(consignacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(consignacion_detalle_control) {
		
		if(consignacion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(consignacion_detalle_control);
		}
		
		if(consignacion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(consignacion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(consignacion_detalle_control) {
		if(consignacion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("consignacion_detalleReturnGeneral",JSON.stringify(consignacion_detalle_control.consignacion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control) {
		if(consignacion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(consignacion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(consignacion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(consignacion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			consignacion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"consignacion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				consignacion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"consignacion_detalle");
			}			
			
			consignacion_detalle_funcion1.mostrarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensaje,consignacion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			consignacion_detalle_funcion1.mostrarDivMensaje(false,consignacion_detalle_control.strAuxiliarMensaje,consignacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(consignacion_detalle_control) {
		if(consignacion_detalle_funcion1.esPaginaForm(consignacion_detalle_constante1)==true) {
			window.opener.consignacion_detalle_webcontrol1.actualizarPaginaTablaDatos(consignacion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(consignacion_detalle_control) {
		consignacion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(consignacion_detalle_control.strAuxiliarUrlPagina);
				
		consignacion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(consignacion_detalle_control.strAuxiliarTipo,consignacion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(consignacion_detalle_control) {
		consignacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensajeAlert,consignacion_detalle_control.strAuxiliarCssMensaje);
			
		if(consignacion_detalle_funcion1.esPaginaForm(consignacion_detalle_constante1)==true) {
			window.opener.consignacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensajeAlert,consignacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(consignacion_detalle_control) {
		this.consignacion_detalle_controlInicial=consignacion_detalle_control;
			
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(consignacion_detalle_control.strStyleDivArbol,consignacion_detalle_control.strStyleDivContent
																,consignacion_detalle_control.strStyleDivOpcionesBanner,consignacion_detalle_control.strStyleDivExpandirColapsar
																,consignacion_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(consignacion_detalle_control) {
		this.actualizarCssBotonesPagina(consignacion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(consignacion_detalle_control.tiposReportes,consignacion_detalle_control.tiposReporte
															 	,consignacion_detalle_control.tiposPaginacion,consignacion_detalle_control.tiposAcciones
																,consignacion_detalle_control.tiposColumnasSelect,consignacion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(consignacion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(consignacion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(consignacion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(consignacion_detalle_control) {
	
		var indexPosition=consignacion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=consignacion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(consignacion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosconsignacionsFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosbodegasFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosproductosFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosunidadsFK(consignacion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(consignacion_detalle_control.strRecargarFkTiposNinguno!=null && consignacion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && consignacion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosconsignacionsFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosbodegasFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosproductosFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosunidadsFK(consignacion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaconsignacionFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.consignacionsFK);
	}

	cargarComboEditarTablabodegaFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(consignacion_detalle_control) {
		jQuery("#tdconsignacion_detalleNuevo").css("display",consignacion_detalle_control.strPermisoNuevo);
		jQuery("#trconsignacion_detalleElementos").css("display",consignacion_detalle_control.strVisibleTablaElementos);
		jQuery("#trconsignacion_detalleAcciones").css("display",consignacion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trconsignacion_detalleParametrosAcciones").css("display",consignacion_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(consignacion_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(consignacion_detalle_control);
				
		if(consignacion_detalle_control.consignacion_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(consignacion_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(consignacion_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(consignacion_detalle_control) {
	
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id").val(consignacion_detalle_control.consignacion_detalleActual.id);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-created_at").val(consignacion_detalle_control.consignacion_detalleActual.versionRow);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-updated_at").val(consignacion_detalle_control.consignacion_detalleActual.versionRow);
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_consignacion!=null && consignacion_detalle_control.consignacion_detalleActual.id_consignacion>-1){
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val() != consignacion_detalle_control.consignacion_detalleActual.id_consignacion) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val(consignacion_detalle_control.consignacion_detalleActual.id_consignacion).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").select2("val", null);
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_bodega!=null && consignacion_detalle_control.consignacion_detalleActual.id_bodega>-1){
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != consignacion_detalle_control.consignacion_detalleActual.id_bodega) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(consignacion_detalle_control.consignacion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_producto!=null && consignacion_detalle_control.consignacion_detalleActual.id_producto>-1){
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != consignacion_detalle_control.consignacion_detalleActual.id_producto) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(consignacion_detalle_control.consignacion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_unidad!=null && consignacion_detalle_control.consignacion_detalleActual.id_unidad>-1){
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != consignacion_detalle_control.consignacion_detalleActual.id_unidad) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(consignacion_detalle_control.consignacion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-cantidad").val(consignacion_detalle_control.consignacion_detalleActual.cantidad);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-precio").val(consignacion_detalle_control.consignacion_detalleActual.precio);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(consignacion_detalle_control.consignacion_detalleActual.descuento_porciento);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(consignacion_detalle_control.consignacion_detalleActual.descuento_monto);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-sub_total").val(consignacion_detalle_control.consignacion_detalleActual.sub_total);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(consignacion_detalle_control.consignacion_detalleActual.iva_porciento);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-iva_monto").val(consignacion_detalle_control.consignacion_detalleActual.iva_monto);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-total").val(consignacion_detalle_control.consignacion_detalleActual.total);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-recibido").val(consignacion_detalle_control.consignacion_detalleActual.recibido);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-observacion").val(consignacion_detalle_control.consignacion_detalleActual.observacion);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(consignacion_detalle_control.consignacion_detalleActual.impuesto2_porciento);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(consignacion_detalle_control.consignacion_detalleActual.impuesto2_monto);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-cotizacion").val(consignacion_detalle_control.consignacion_detalleActual.cotizacion);
		jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-moneda").val(consignacion_detalle_control.consignacion_detalleActual.moneda);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+consignacion_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("consignacion_detalle","estimados","","form_consignacion_detalle",formulario,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(consignacion_detalle_control) {
		jQuery("#spanstrMensajeid").text(consignacion_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(consignacion_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(consignacion_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_consignacion").text(consignacion_detalle_control.strMensajeid_consignacion);		
		jQuery("#spanstrMensajeid_bodega").text(consignacion_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(consignacion_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(consignacion_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(consignacion_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(consignacion_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(consignacion_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(consignacion_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajesub_total").text(consignacion_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajeiva_porciento").text(consignacion_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(consignacion_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(consignacion_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(consignacion_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajeobservacion").text(consignacion_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(consignacion_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(consignacion_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajecotizacion").text(consignacion_detalle_control.strMensajecotizacion);		
		jQuery("#spanstrMensajemoneda").text(consignacion_detalle_control.strMensajemoneda);		
	}
	
	actualizarCssBotonesMantenimiento(consignacion_detalle_control) {
		jQuery("#tdbtnNuevoconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarconsignacion_detalle").css("visibility",consignacion_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosconsignacionsFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion",consignacion_detalle_control.consignacionsFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_3",consignacion_detalle_control.consignacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion",consignacion_detalle_control.consignacionsFK);

	};

	cargarCombosbodegasFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega",consignacion_detalle_control.bodegasFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_4",consignacion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",consignacion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto",consignacion_detalle_control.productosFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_5",consignacion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",consignacion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad",consignacion_detalle_control.unidadsFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_6",consignacion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",consignacion_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosconsignacionsFK(consignacion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(consignacion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(consignacion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(consignacion_detalle_control) {

	};

	
	
	setDefectoValorCombosconsignacionsFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idconsignacionDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val() != consignacion_detalle_control.idconsignacionDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val(consignacion_detalle_control.idconsignacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(consignacion_detalle_control.idconsignacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != consignacion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(consignacion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(consignacion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != consignacion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(consignacion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(consignacion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != consignacion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(consignacion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(consignacion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion_detalle","estimados","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion_detalle","estimados","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//consignacion_detalle_control
		
	

		var cantidad="form"+consignacion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var precio="form"+consignacion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","precio",precio,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var descuento_porciento="form"+consignacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var iva_porciento="form"+consignacion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosconsignacionsFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosproductosFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(consignacion_detalle_control);
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
	onLoadCombosEventosFK(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosconsignacionsFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(consignacion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(consignacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_detalle_funcion1.validarFormularioJQuery(consignacion_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("consignacion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("consignacion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,"consignacion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("consignacion","id_consignacion","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaconsignacion("id_consignacion");
				//alert(jQuery('#form-id_consignacion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(consignacion_detalle_control) {
		
		
		
		if(consignacion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdconsignacion_detalleActualizarToolBar").css("display",consignacion_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdconsignacion_detalleEliminarToolBar").css("display",consignacion_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trconsignacion_detalleElementos").css("display",consignacion_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trconsignacion_detalleAcciones").css("display",consignacion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trconsignacion_detalleParametrosAcciones").css("display",consignacion_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdconsignacion_detalleCerrarPagina").css("display",consignacion_detalle_control.strPermisoPopup);		
		jQuery("#tdconsignacion_detalleCerrarPaginaToolBar").css("display",consignacion_detalle_control.strPermisoPopup);
		//jQuery("#trconsignacion_detalleAccionesRelaciones").css("display",consignacion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=consignacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + consignacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Consignacion Detalles";
		sTituloBanner+=" - " + consignacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdconsignacion_detalleRelacionesToolBar").css("display",consignacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosconsignacion_detalle").css("display",consignacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		consignacion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		consignacion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		consignacion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		consignacion_detalle_webcontrol1.registrarEventosControles();
		
		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			consignacion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(consignacion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(consignacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(consignacion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(consignacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(consignacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(consignacion_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
						//consignacion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(consignacion_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(consignacion_detalle_constante1.BIG_ID_ACTUAL,"consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
						//consignacion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			consignacion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);	
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

var consignacion_detalle_webcontrol1 = new consignacion_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {consignacion_detalle_webcontrol,consignacion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.consignacion_detalle_webcontrol1 = consignacion_detalle_webcontrol1;


if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = consignacion_detalle_webcontrol1.onLoadWindow; 
}

//</script>